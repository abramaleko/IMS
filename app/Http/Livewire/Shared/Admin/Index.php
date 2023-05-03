<?php

namespace App\Http\Livewire\Shared\Admin;

use App\Models\SharedDocs;
use Livewire\Component;

class Index extends Component
{
    public $docs;
    public function render()
    {
        return view('livewire.shared.admin.index');
    }

    public function mount(){
      $this->docs=SharedDocs::orderBy('id','desc')->get();
    }
}
