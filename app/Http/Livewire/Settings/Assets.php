<?php

namespace App\Http\Livewire\Settings;

use App\Models\Assets as ModelsAssets;

use Livewire\Component;

class Assets extends Component
{
    public $assets;

    public $selectedAsset;

    public ModelsAssets $new_asset;

    protected $rules = [
        'new_asset.asset_name' => 'required|string',
        'new_asset.asset_type' => 'required|string',
        'new_asset.reward_level' => 'required|string',
        'new_asset.payout_amount' => 'required|integer',
    ];

    public function render()
    {
        return view('livewire.settings.assets');
    }

    public function mount(){
        $this->new_asset = new ModelsAssets();
        $this->assets=ModelsAssets::all();
    }

    public function saveAsset(){
        $this->validate();

        $this->new_asset->save();

        session()->flash('AssetCreate', 'Successfully added a new asset');

        $this->assets=ModelsAssets::all();

        $this->dispatchBrowserEvent('closeCreateAssetModal');

    }

    public function deleteAsset(ModelsAssets $asset){

        $asset->delete();

        $this->assets=ModelsAssets::all();

        session()->flash('AssetDelete', 'Successfully deleted asset');

    }

    public function updateAsset(){

        $this->validate([
            'selectedAsset.asset_name' => 'required|string',
            'selectedAsset.asset_type' => 'required|string',
            'selectedAsset.reward_level' => 'required|string',
            'selectedAsset.payout_amount' => 'required|integer',
        ]);


        $asset=ModelsAssets::find($this->selectedAsset['id']);
        $asset->asset_name=$this->selectedAsset['asset_name'];
        $asset->asset_type=$this->selectedAsset['asset_type'];
        $asset->reward_level=$this->selectedAsset['reward_level'];
        $asset->payout_amount=$this->selectedAsset['payout_amount'];
        $asset->save();

        $this->assets=ModelsAssets::all();

        session()->flash('AssetUpdated', 'Successfully updated asset');

        $this->dispatchBrowserEvent('closeEditAssetModal');

    }


}
