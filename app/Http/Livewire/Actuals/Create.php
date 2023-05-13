<?php

namespace App\Http\Livewire\Actuals;

use App\Models\Actuals;
use App\Models\Projects;
use Illuminate\Validation\Rule;
// use Illuminate\Contracts\Validation\Rule;
use Livewire\Component;


class Create extends Component
{
    public $projects;

    public $project='',$year,$month,$gs_ngr,$gs_community_allocation,$cc_ngr,$cc_community_allocation,$ex_ngr,$ex_community_allocation,$uk_ngr,$uk_community_allocation;

    public function render()
    {
        return view('livewire.actuals.create');
    }

    public function mount(){
      $this->projects=Projects::all();
    }

    public function validateForm(){
        $this->validate([
            'project' => 'required',
            'year' => 'required|numeric',
            'month' => [
                         'required',
                         Rule::unique('actuals')->where(function ($query) {
                             return $query->where('year', $this->year);
                         })
                    ],
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

        $actual=new Actuals();
        $actual->project_id=$this->project;
        $actual->year=$this->year;
        $actual->month=$this->month;
        $actual->gs_ngr=$this->gs_ngr;
        $actual->gs_community_allocation=$this->gs_community_allocation;
        $actual->cc_ngr=$this->cc_ngr;
        $actual->cc_community_allocation=$this->cc_community_allocation;
        $actual->ex_ngr=$this->ex_ngr;
        $actual->ex_community_allocation=$this->ex_community_allocation;
        $actual->uk_ngr=$this->uk_ngr;
        $actual->uk_community_allocation=$this->uk_community_allocation;
        $actual->save();

        $this->reset();

        return redirect()->route('actuals.index')->with('success','Successfully created asset');

    }
}
