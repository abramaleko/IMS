<?php

namespace App\Http\Livewire\Shared\Admin;

use App\Models\SharedDocs;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class Upload extends Component
{
    use WithFileUploads;

    public  $title,$description,$valid_untill,$file;

    public $rules=[
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'valid_untill' => 'required|date',
        'file' => 'required|mimes:png,jpeg,jpg,pdf|max:5120', // 5MB Max,
    ];

    public function render()
    {
        return view('livewire.shared.admin.upload');
    }

    public function saveDocument(){
        $this->validate();

        $filepath=$this->file->store('shared-docs');


        $newDoc=new SharedDocs();
        $newDoc->title=$this->title;
        $newDoc->description=$this->description;
        $newDoc->valid_untill=Carbon::parse($this->valid_untill)->format('Y-m-d');
        $newDoc->filepath=$filepath;
        $newDoc->save();

        return redirect()->route('admin.shared-docs.index')->with('success','Document Uploaded Successfully');

    }

    public function resetForm(){
        $this->reset();
    }
}
