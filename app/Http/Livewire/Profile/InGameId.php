<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InGameId extends Component
{
    public $game_id;

    public function updateGameInfo(){
        $this->validate([
            'game_id' => 'required|string',
        ]);

        Auth::user()->investor->ukuid=$this->game_id;
        Auth::user()->investor->save();

        session()->flash('updateGameInfo', 'Successfully Updated Game Id Info');

    }
    public function render()
    {
        $this->game_id=Auth::user()->investor->ukuid;
        return view('livewire.profile.in-game-id');
    }
}
