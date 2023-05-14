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

    public $project='',$year,$month,$ngr,$community_share;

    public function render()
    {
        return view('livewire.actuals.create');
    }

    public function mount(){
        $this->projects=Projects::where('status',true)->get();
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
            'ngr' => 'required',
            'community_share' => 'required',

        ]);
    }

    public function submit(){
        $this->validateForm();

        $actual=new Actuals();
        $actual->project_id=$this->project;
        $actual->year=$this->year;
        $actual->month=$this->month;
        $actual->ngr=$this->ngr;
        $actual->community_share=$this->community_share;
        $actual->save();

        $this->reset();

        return redirect()->route('actuals.index')->with('success','Successfully created asset');

    }
}
