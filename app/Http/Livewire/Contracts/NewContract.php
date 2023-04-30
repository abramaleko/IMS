<?php

namespace App\Http\Livewire\Contracts;

use App\Models\Assets;
use App\Models\Contracts;
use App\Models\Investors;
use App\Models\Projects;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Validator;


class NewContract extends Component
{
    use WithFileUploads;

    public $investors,$projects;
    public $investor_id="",$project_id="",$amount,$roi_period,$start_date,$contract_duration,$payment_slips=[],$contracts=[],$additional_description,$additional_attachments=[],$asset_address,$asset='';
    public $assets;

    public function render()
    {
        return view('livewire.contracts.new-contract');
    }

    public function mount()
    {
        $this->investors=Investors::all();
        $this->projects=Projects::all();
        $this->assets=Assets::all();
    }

    protected $rules=[
        'investor_id'=> 'required',
        'project_id'=> 'required',
        'amount'=> 'required',
        'roi_period' => 'required|integer',
        'start_date' => 'required|date',
        'contract_duration'=> 'required|integer',
        'payment_slips'=>'required',
        'payment_slips.*' => 'required|mimes:png,jpeg,jpg,pdf|max:5120', // 5MB Max
        'contracts' =>'required',
         'contracts.*' => 'required|mimes:png,jpeg,jpg,pdf|max:5120', // 5MB Max
         'additional_description' => 'string|max:500|nullable',
         'additional_attachments.*' => 'nullable|mimes:png,jpeg,jpg,pdf|max:5120', // 5MB Max
         'asset_address' => 'nullable|string',
         'asset'=> 'required'
    ];

    public function resetForm(){
        $this->reset([
            'investor_id','project_id','amount','roi_period','start_date','contract_duration','contracts','payment_slips','additional_description','additional_attachments'
        ]);
    }


    protected function validateAmountCredibility(){

      //custom validation for  amount to check if the user in the office assigned has
     //the credibility to upload the amount inserted

       $user_office=Auth::user()->office;

       if ( ($user_office->min_amount<= $this->amount) && ($this->amount <= $user_office->max_amount) ) {
          return true;
       }
       else {
           return false;
       }
    }

    public function uploadContract(){

        //calls the validator instance for validation
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if (! $this->validateAmountCredibility()) {
                    $validator->errors()->add('amount', 'Your office does not have the credibility to upload the contract of the mentioned amount');
                }
            });
        })->validate();


        $contract_info=new Contracts();
        $contract_info->investor_id=$this->investor_id;
        $contract_info->project_id=$this->project_id;
        $contract_info->uploader_id=Auth::user()->id;
        $contract_info->amount=$this->amount;
        $contract_info->start_date=$this->start_date;
        $contract_info->end_date=Carbon::parse($this->start_date)->addMonths($this->contract_duration);
        $contract_info->roi_period=$this->roi_period;
        $contract_info->additional_description=$this->additional_description;
        $contract_info->asset_id=$this->asset;
        $contract_info->asset_address=$this->asset_address;


        //attachments
        $path=[];
         foreach ($this->contracts as $contract) {
             $contract_path=$contract->store('contract_attachments');
             array_push($path,$contract_path);
         }
         $contract_info->contract_attachments=serialize($path);
         $path=[];  //clears the paths

         foreach ($this->payment_slips as $slips) {
            $slips_path=$slips->store('payment_slips');
            array_push($path,$slips_path);
        }
        $contract_info->receipt_attachments=serialize($path);
        $path=[];

        if ($this->additional_attachments) {
            foreach ($this->additional_attachments as $attachment) {
               $additonal_path=$attachment->store('attachment_file');
               array_push($path,$additonal_path);
            }
             $contract_info->additional_attachments=serialize($path);
             $path=[];
        }

        $contract_info->save();

        return redirect()->route('contracts.index')->with('success','Contract Added Successfully');











    }
}
