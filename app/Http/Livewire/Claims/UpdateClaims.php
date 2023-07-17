<?php

namespace App\Http\Livewire\Claims;

use App\Models\monthlyRewardClaims;
use Livewire\Component;

class UpdateClaims extends Component
{
    public $claims;

    public $selectedClaim;

    public function render()
    {
        $this->claims=monthlyRewardClaims::with('investor')->orderBy('id','desc')->get();

        return view('livewire.claims.update-claims');
    }

    public function updateClaim(){
        $this->validate([
            'selectedClaim.facebook' => 'nullable|url',
            'selectedClaim.linkedin' => 'nullable|url',
            'selectedClaim.twitter' => 'nullable|url',
        ]);

        $claim=monthlyRewardClaims::find($this->selectedClaim['id']);
        $claim->facebook=$this->selectedClaim['facebook'];
        $claim->linkedin=$this->selectedClaim['linkedin'];
        $claim->twitter=$this->selectedClaim['twitter'];
        $claim->save();


        session()->flash('success', 'Successfully updated claim info');

        $this->dispatchBrowserEvent('closeClaimModal');
    }
}
