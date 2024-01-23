<?php

namespace App\Http\Livewire\Investors;

use App\Models\Investors;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewInvestor extends Component
{
    use WithFileUploads;

    //togglers
    public $open2 = false, $final = false;

    public $investor_name, $dob, $gender = "", $residence, $phone_no, $email, $id_copy, $investor_image;
    public $account_name, $account_number, $bank_name;
    public $next_kin_name, $next_kin_relationship, $next_kin_phone, $next_of_kin_id_copy;

    public function render()
    {
        return view('livewire.investors.new-investor');
    }

    public function submitFirst()
    {
        //validates the first page
        $this->validate([
            'investor_name' => 'required|string|max:50',
            'dob' => 'required|date',
            'gender' => 'required',
            'residence' => 'required',
            'phone_no' => 'required',
            'email' => 'nullable|email',
            'id_copy' => 'required|mimes:png,jpeg,jpg,pdf|max:4096',
            'investor_image' => 'nullable|image|max:4096',
        ],
            [
                'id_copy.max' => 'The file should not be greater than 4Mb',
                'investor_image.max' => 'The file should not be greater than 4Mb',
            ]);

        //shows the second page
        $this->open2 = true;
    }

    public function submitSecond()
    {

        //validates the second page
        $this->validate([
            'account_name' => 'required|string|max:50',
            'account_number' => 'required|string',
            'bank_name' => 'required|string',
        ]);

        //shows the last page
        $this->final = true;
    }

    public function submitFinal()
    {
        //validates the last page
        $this->validate([
            'next_kin_name' => 'required|string|max:50',
            'next_kin_relationship' => 'required|string',
            'next_kin_phone' => 'required|string',
            'next_of_kin_id_copy' => 'nullable|mimes:png,jpeg,jpg,pdf|max:4096',

        ]);


        //inserts the data

        $data = new Investors();
        $data->investor_name = $this->investor_name;
        $data->residence_area = $this->residence;
        $data->phone_number = $this->phone_no;
        $data->email = $this->email;
        $data->dob = $this->dob;
        $data->gender = $this->gender;

        if ($this->id_copy) {
            //id copies
            // $path=$this->id_copy->storeAs('id_copies', $this->investor_name.' id'.mt_rand(100,10000));
            $path = $this->id_copy->store('id_copies');

            $data->id_path = $path;
        }
        if ($this->investor_image) {
            //investor image
            // $path=$this->investor_image->storeAs('investor_images', $this->investor_name.' id'.mt_rand(100,10000));
            $path = $this->investor_image->store('investor_images');
            $data->image_path = $path;
        }

        $data->account_name = $this->account_name;
        $data->account_number = $this->account_number;
        $data->bank_name = $this->bank_name;

        $data->nxt_kin_name = $this->next_kin_name;
        $data->nxt_kin_relationship = $this->next_kin_relationship;
        $data->nxt_kin_phone = $this->next_kin_phone;

        if ($this->next_of_kin_id_copy) {
            $filename = $this->next_kin_name . ' id' . mt_rand(100, 10000);
            $extension = $this->next_of_kin_id_copy->getClientOriginalExtension();
            $path = $this->next_of_kin_id_copy->storeAs('nok_ids', $filename . '.' . $extension);
            $data->nxt_kin_id_path = $path;
        }

        $data->save();

        return redirect()->route('investors.show')->with('success', 'Successfully registered investor');
    }


    public function resetForm()
    {
        $this->reset();
    }

}
