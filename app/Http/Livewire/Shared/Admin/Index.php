<?php

namespace App\Http\Livewire\Shared\Admin;

use App\Models\SharedDocs;
use Illuminate\Support\Facades\Storage;
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

    public function delete(SharedDocs $doc){
        unlink(storage_path('app/'.$doc->filepath));

        $doc->delete();

        session()->flash('success', 'Successfully deleted document');
    }
}
