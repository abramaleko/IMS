<?php

namespace App\Http\Livewire\Actuals;

use App\Models\Actuals;
use App\Models\Projects;
use Illuminate\Validation\Rule;
use Livewire\Component;


class Edit extends Component
{
    public $projects;
    public $project='',$year,$month,$ngr,$community_share;
    public $actual;

    public function render()
    {
        return view('livewire.actuals.edit');
    }

    public function mount($actual){
        $this->projects=Projects::all();
        $this->actual=$actual;
        $this->innitializeForm();
      }

      public function innitializeForm(){
        $this->fill([
           'project' => $this->actual->project_id,
            'year' => $this->actual->year,
            'month' => $this->actual->month,
            'ngr' => $this->actual->ngr,
            'community_share' => $this->actual->community_share,
        ]);
      }

      public function validateForm(){
        $this->validate([
            'project' => 'required',
            'year' => 'required|numeric',
            'month' => ['required'],
            'ngr' => 'required',
            'community_share' => 'required',
        ]);
    }

    public function submit(){
        $this->validateForm();

        $this->actual->project_id=$this->project;
        $this->actual->year=$this->year;
        $this->actual->month=$this->month;
        $this->actual->ngr=$this->ngr;
        $this->actual->community_share=$this->community_share;
        $this->actual->save();

        $this->reset();

        return redirect()->route('actuals.index')->with('success','Successfully updated asset');

    }
}
