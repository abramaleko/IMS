<?php

namespace App\Http\Livewire\Actuals;

use App\Models\Actuals;
use Livewire\Component;

class Index extends Component
{
    public $actuals;
    public function render()
    {
        return view('livewire.actuals.index');
    }

    public function mount(){
       $this->actuals=Actuals::orderBy('id','desc')->get();
    }
}
