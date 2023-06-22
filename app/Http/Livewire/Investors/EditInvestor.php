<?php

namespace App\Http\Livewire\Investors;
use App\Models\Investors as ModelInvestor;

use Livewire\Component;

class EditInvestor extends Component
{
      //togglers
   public $open2=false,$final=false;

   public $investor_name,$dob,$gender,$residence,$phone_no,$email,$id_copy;
   public $account_name,$account_number,$bank_name,$reward_address,$chain;
   public $next_kin_name,$next_kin_relationship,$next_kin_phone,$next_of_kin_id_copy;

   public $investor;

   public function render()
   {
       return view('livewire.investors.edit-investor');
   }

    public function mount(ModelInvestor $investor)
    {
        $this->investor_name=$investor->investor_name;
        $this->dob=$investor->dob;
        $this->gender=$investor->gender;
        $this->residence=$investor->residence_area;
        $this->phone_no=$investor->phone_number;
        $this->email=$investor->email;

        $this->account_name=$investor->account_name;
        $this->account_number=$investor->account_number;
        $this->bank_name=$investor->bank_name;
        $this->reward_address=$investor->reward_address;
        $this->chain=$investor->chain;

        $this->next_kin_name=$investor->nxt_kin_name;
        $this->next_kin_relationship=$investor->nxt_kin_relationship;
        $this->next_kin_phone=$investor->nxt_kin_phone;

        $this->investor=$investor;
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
        ]);

         //shows the second page
         $this->open2=true;
    }
    public function submitSecond(){

        //validates the second page
        $this->validate([
        'account_name' => 'required|string|max:50',
        'account_number' => 'required|string',
        'bank_name' => 'required|string',
        'reward_address' => 'required|string'
        ]);

        //shows the last page
        $this->final=true;
    }

    public function submitFinal()
    {
        //validates the last page
        $this->validate([
            'next_kin_name' => 'required|string|max:50',
            'next_kin_relationship' => 'required|string',
            'next_kin_phone' => 'required|string',
            'next_of_kin_id_copy'  => 'nullable|mimes:png,jpeg,jpg,pdf|max:4096',

            ]);



            //inserts the data

            $this->investor->investor_name=$this->investor_name;
            $this->investor->residence_area=$this->residence;
            $this->investor->phone_number=$this->phone_no;
            $this->investor->email=$this->email;
            $this->investor->dob=$this->dob;
            $this->investor->gender=$this->gender;


            $this->investor->account_name=$this->account_name;
            $this->investor->account_number=$this->account_number;
            $this->investor->bank_name=$this->bank_name;
            $this->investor->reward_address=$this->reward_address;
            $this->investor->chain=$this->chain;

            $this->investor->nxt_kin_name=$this->next_kin_name;
            $this->investor->nxt_kin_relationship=$this->next_kin_relationship;
            $this->investor->nxt_kin_phone=$this->next_kin_phone;


            $this->investor->save();
            return redirect()->route('investors.show')->with('success','Successfully updated investor');

    }

    public function resetForm()
    {
        $this->reset();
    }

}

