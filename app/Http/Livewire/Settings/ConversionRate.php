<?php

namespace App\Http\Livewire\Settings;

use App\Models\ConversionRate as ModelsConversionRate;
use Livewire\Component;

class ConversionRate extends Component
{
    public $rate,$newRateInput;

    public function updateRate(){
        $this->validate([
            'newRateInput' => 'required|integer'
        ]);
        $newRate=ModelsConversionRate::first();
        $newRate->rate=$this->newRateInput;
        $newRate->save();

        $this->reset(['newRateInput']);

        session()->flash('ConversionRate', 'Successfully updated conversion rate');

        $this->dispatchBrowserEvent('closeRateModal');

    }

    public function render()
    {
        $this->rate=ModelsConversionRate::first()->rate;
        return view('livewire.settings.conversion-rate');
    }
}
