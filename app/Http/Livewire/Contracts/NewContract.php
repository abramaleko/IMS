<?php

namespace App\Http\Livewire\Contracts;

use App\Models\Assets;
use App\Models\ContractAssets;
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
    public $investor_id="",$project="",$amount,$roi_period,$start_date,$contract_duration,$payment_slips=[],$contracts=[],$additional_description,$additional_attachments=[];
    public $newAsset='',$newAssetId,$newAssetName,$newAssetType,$newRewardLevel,$newPayoutAmout,$newAssetAddress;
    public $assets,$contractAssets=[];

    public function render()
    {
        return view('livewire.contracts.new-contract');
    }

    public function mount()
    {
        $this->investors=Investors::all();
        $this->projects=Projects::where('status',true)->get();
        $this->assets=Assets::all();
    }

    protected $rules=[
        'investor_id'=> 'required',
        'project'=> 'required',
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
         'contractAssets' => 'required', // 5MB Max
    ];

    public function resetForm(){
        $this->reset([
            'investor_id','project','amount','roi_period','start_date','contract_duration','contracts','payment_slips','additional_description','additional_attachments'
        ]);
    }
    public function updatedNewAsset($value){
        $asset=json_decode($value);

        $this->newAssetId=$asset->id;

        $this->newAssetName=$asset->asset_name;
        $this->newAssetType=$asset->asset_type;
        $this->newRewardLevel=$asset->reward_level;
        $this->newPayoutAmout=$asset->payout_amount;
    }

    public function addContractAsset(){
        $this->validate([
            'newAsset' => 'required',
            'newAssetAddress' => 'required|string|unique:contract_assets,asset_address'

        ]);

        //check for duplicates
        foreach ($this->contractAssets as $asset) {
          if (in_array($this->newAssetAddress,$asset)) {
            $this->addError('newAssetAddress', 'Asset address should be unique');
            return;
          }
        }

        array_push($this->contractAssets,[
            'id' => $this->newAssetId,
            'asset_name' => $this->newAssetName,
            'asset_type' => $this->newAssetType,
            'reward_level' => $this->newRewardLevel,
            'payout_amount' => $this->newPayoutAmout,
            'asset_address' => $this->newAssetAddress
        ]);

        $this->reset(['newAsset','newAssetId','newAssetName','newAssetType','newRewardLevel','newPayoutAmout','newAssetAddress']);

        $this->dispatchBrowserEvent('closenewContractAssettModal');

    }

    public function removeContractAsset($index){
        unset($this->contractAssets[$index - 1]);
        $this->contractAssets = array_values($this->contractAssets); //re-indexs the array
    }

    public function uploadContract(){

        $this->validate();

        $contract_info=new Contracts();
        $contract_info->investor_id=$this->investor_id;
        $contract_info->project_id=$this->project;
        $contract_info->uploader_id=Auth::user()->id;
        $contract_info->amount=$this->amount;
        $contract_info->start_date=$this->start_date;
        $contract_info->end_date=Carbon::parse($this->start_date)->addMonths($this->contract_duration);
        $contract_info->roi_period=$this->roi_period;
        $contract_info->additional_description=$this->additional_description;


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

        //uploads the contract assets
        foreach ($this->contractAssets as $asset) {
           $contractAsset=new ContractAssets();
           $contractAsset->asset_id=$asset['id'];
           $contractAsset->asset_address=$asset['asset_address'];
           $contractAsset->contract_id=$contract_info->id;
           $contractAsset->save();
        }


        return redirect()->route('contracts.index')->with('success','Contract Added Successfully');











    }
}
