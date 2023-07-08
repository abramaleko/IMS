<?php

namespace App\Http\Livewire\Settings;

use App\Models\AssetTypes as ModelsAssetTypes;
use Livewire\Component;

class AssetTypes extends Component
{
    public $assetsTypes;

    public $asset_name;


    public function newAssetType(){
        ModelsAssetTypes::create(['name' => $this->asset_name]);
        $this->reset('asset_name');

        session()->flash('newAssetTypeSuccess', 'Successfully added a new asset type');

        $this->dispatchBrowserEvent('closeAssetTypeModal');
    }

    public function deleteAsset(ModelsAssetTypes $assetType){
        $assetType->delete();

        session()->flash('assetTypeDelete', 'Successfully deleted asset type');
    }

    public function render()
    {
        $this->assetsTypes=ModelsAssetTypes::all();

        return view('livewire.settings.asset-types');
    }
}
