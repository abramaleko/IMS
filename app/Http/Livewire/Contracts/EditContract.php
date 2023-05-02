<?php

namespace App\Http\Livewire\Contracts;

use App\Models\Contracts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;
use Livewire\WithFileUploads;
use Livewire\Component;

class EditContract extends Component
{
    use WithFileUploads;

    public $contract;

    public $investor_name,$project_name,$amount,$roi_period,$start_date,$end_date,$payment_slips=[],$contracts=[],$additional_description,$additional_attachments=[];

    public function render()
    {
        return view('livewire.contracts.edit-contract');
    }

    public function mount(Contracts $contract)
    {
      $this->fill([
          'contract' => $contract,
          'investor_name' => $contract->investor->investor_name,
          'project_name' => $contract->project->name,
          'amount' => $contract->amount,
          'roi_period' => $contract->roi_period,
          'start_date' => $contract->start_date,
          'end_date' => $contract->end_date,
          'additional_description' => $contract->additional_description,
      ]);

    }

    protected $rules=[
        'amount'=> 'required',
        'roi_period' => 'required|integer',
        'payment_slips'=>'nullable',
        'payment_slips.*' => 'nullable|mimes:png,jpeg,jpg,pdf|max:5120', // 5MB Max
        'contracts' =>'nullable',
         'contracts.*' => 'nullable|mimes:png,jpeg,jpg,pdf|max:5120', // 5MB Max
         'additional_description' => 'string|max:500|nullable',
         'additional_attachments.*' => 'nullable|mimes:png,jpeg,jpg,pdf|max:5120' // 5MB Max
    ];


    public function editContract()
    {
      $this->contract->amount=$this->amount;
      $this->contract->roi_period=$this->roi_period;

     //attachments
      $path=[];
      if ($this->payment_slips) {

        //deletes the previous files
         foreach ($this->contract->payment_slips as $attachment) {
             Storage::delete(storage_path('app/'.$attachment));
         }

         //store the files
         foreach ($this->payment_slips as $slips) {
             $slips_path=$slips->store('payment_slips');
            array_push($path,$slips_path);
         }
         $this->contract->receipt_attachments=serialize($path);
         $path=[];
       }

       if ($this->contracts) {

        //deletes the previous files
         foreach ($this->contract->contract_attachments as $attachment) {
             Storage::delete(storage_path('app/'.$attachment));
         }

         //store the files
         foreach ($this->contracts as $contract_doc) {
             $contract_path=$contract_doc->store('contract_attachments');
            array_push($path,$contract_path);
         }
         $this->contract->contract_attachments=serialize($path);
         $path=[];
       }

       if ($this->additional_attachments) {

        //deletes the previous files
         foreach ($this->contract->additional_attachments as $attachment) {
             Storage::delete(storage_path('app/'.$attachment));
         }

         //store the files
         foreach ($this->additional_attachments as $additional) {
             $additional_path=$additional->store('additional_attachments');
            array_push($path,$additional_path);
         }
         $this->contract->additional_attachments=serialize($path);
         $this->contract->additional_description=$this->additional_description;
         $path=[];
       }

       $this->contract->modified_by=Auth::user()->id;
       $this->contract->save();

       return redirect()->route('contracts.index')->with('success','Contract Updated Successfully');


    }


}

