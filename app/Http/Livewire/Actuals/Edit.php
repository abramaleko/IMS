<?php

namespace App\Http\Livewire\Actuals;

use App\Models\Actuals;
use App\Models\Projects;
use Illuminate\Validation\Rule;
use Livewire\Component;


class Edit extends Component
{
    public $projects;
    public $project='',$year,$month,$gs_ngr,$gs_community_allocation,$cc_ngr,$cc_community_allocation,$ex_ngr,$ex_community_allocation,$uk_ngr,$uk_community_allocation;
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
            'gs_ngr' => $this->actual->gs_ngr,
            'gs_community_allocation' => $this->actual->gs_community_allocation,
            'cc_ngr' => $this->actual->cc_ngr,
            'cc_community_allocation' => $this->actual->cc_community_allocation,
            'ex_ngr' => $this->actual->ex_ngr,
            'ex_community_allocation' => $this->actual->ex_community_allocation,
            'uk_ngr' => $this->actual->uk_ngr,
            'uk_community_allocation' => $this->actual->uk_community_allocation,
        ]);
      }

      public function validateForm(){
        $this->validate([
            'project' => 'required',
            'year' => 'required|numeric',
            'month' => ['required'],
            'gs_ngr' => 'required',
            'gs_community_allocation' => 'required',
            'cc_ngr' => 'required',
            'cc_community_allocation' => 'required',
            'ex_ngr' => 'required',
            'ex_community_allocation' => 'required',
            'uk_ngr' => 'required',
            'uk_community_allocation' => 'required',
        ]);
    }

    public function submit(){
        $this->validateForm();

        $this->actual->project_id=$this->project;
        $this->actual->year=$this->year;
        $this->actual->month=$this->month;
        $this->actual->gs_ngr=$this->gs_ngr;
        $this->actual->gs_community_allocation=$this->gs_community_allocation;
        $this->actual->cc_ngr=$this->cc_ngr;
        $this->actual->cc_community_allocation=$this->cc_community_allocation;
        $this->actual->ex_ngr=$this->ex_ngr;
        $this->actual->ex_community_allocation=$this->ex_community_allocation;
        $this->actual->uk_ngr=$this->uk_ngr;
        $this->actual->uk_community_allocation=$this->uk_community_allocation;
        $this->actual->save();

        $this->reset();

        return redirect()->route('actuals.index')->with('success','Successfully updated asset');

    }
}
