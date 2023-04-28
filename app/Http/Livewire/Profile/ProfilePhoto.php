<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;


class ProfilePhoto extends Component
{
    use WithFileUploads;

    public $photo;

    public function render()
    {
        return view('livewire.profile.profile-photo');
    }

    public function updatePhoto(){

        $this->validate([
            'photo' => ['required', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

       $user=Auth::user();

       if ($user->profile_path) {
        //delete previous image
       Storage::disk('public')->delete($user->profile_path);
       }

       $path=$this->photo->store('profile-photos','public');
       $user->profile_path=$path;  //updates the to the new image
       $user->save();

       session()->flash('profileUpdated', 'Successfully Updated Profile Image');
    }

    public function deletePhoto(){
        $user=Auth::user();

        //delete previous image
       Storage::disk('public')->delete($user->profile_path);
       $user->profile_path=null;
       $user->save();

       session()->flash('profileUpdated', 'Successfully Deleted Profile Image');

    }
}
