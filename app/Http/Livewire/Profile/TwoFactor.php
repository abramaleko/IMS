<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TwoFactor extends Component
{
    public $user;

    public function mount(){
        $this->user=Auth::user();
    }
    public function render()
    {
        return view('livewire.profile.two-factor');
    }

    public function toggleTwoFactorAuth(){

       $this->user->two_factor=! $this->user->two_factor;
       $this->user->save();

      $this->user->two_factor ?
        session()->flash('two-factor','You have successfully enabled two factor authorization')
        :
        session()->flash('two-factor','You have successfully disabled two factor authorization')
        ;
    }
}
