<?php

namespace App\Http\Livewire\Settings;

use App\Models\Assets as ModelsAssets;
use App\Models\Projects;


use Livewire\Component;

class Assets extends Component
{
    public $assets;

    public $selectedAsset;

    public $asset_name,$asset_type,$reward_level,$payout_amount;

    public $projects, $selectedProjects=[];

    protected $rules = [
        'asset_name' => 'required|string',
        'asset_type' => 'required|string',
        'reward_level' => 'required|string',
        'payout_amount' => 'required',
        'selectedProjects' => 'required'
    ];

    public function render()
    {
        return view('livewire.settings.assets');
    }

    public function mount(){
        $this->assets=ModelsAssets::all();
        $this->projects=Projects::where('status',true)->get();
    }

    public function saveAsset(){
        $this->validate();
        foreach ($this->selectedProjects as $project_id) {
            $new_asset=new ModelsAssets();
            $new_asset->project_id=$project_id;
            $new_asset->asset_name=$this->asset_name;
            $new_asset->asset_type=$this->asset_type;
            $new_asset->reward_level=$this->reward_level;
            $new_asset->payout_amount=$this->payout_amount;
            $new_asset->save();
        }
        $this->reset(['selectedProjects','asset_name','asset_type','reward_level','payout_amount']);

        session()->flash('AssetCreate', 'Successfully added a new asset');

        $this->assets=ModelsAssets::all();

        $this->dispatchBrowserEvent('closeCreateAssetModal');

    }

    public function deleteAsset(ModelsAssets $asset){

       if ($asset->contractAssets) {
        session()->flash('AssetDelete', 'Can not delete asset because it associated with one or more contract');
        return;
    }
        $asset->delete();

        $this->assets=ModelsAssets::all();

        session()->flash('AssetDelete', 'Successfully deleted asset');

    }

    public function updateAsset(){

        $this->validate([
            'selectedAsset.asset_name' => 'required|string',
            'selectedAsset.asset_type' => 'required|string',
            'selectedAsset.reward_level' => 'required|string',
            'selectedAsset.payout_amount' => 'required',
            'selectedAsset.project_id' => 'required',

        ]);
        $asset=ModelsAssets::find($this->selectedAsset['id']);
        $asset->project_id=$this->selectedAsset['project_id'];
        $asset->asset_name=$this->selectedAsset['asset_name'];
        $asset->asset_type=$this->selectedAsset['asset_type'];
        $asset->reward_level=$this->selectedAsset['reward_level'];
        $asset->payout_amount=$this->selectedAsset['payout_amount'];
        $asset->status=$this->selectedAsset['status'];
        $asset->save();

        $this->assets=ModelsAssets::all();

        session()->flash('AssetUpdated', 'Successfully updated asset');

        $this->dispatchBrowserEvent('closeEditAssetModal');

    }


}
