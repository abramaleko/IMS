<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;


class UpdatePassword extends Component
{
   public $current_password,$password,$password_confirmation;

    public function render()
    {
        return view('livewire.profile.update-password');
    }

    public function updatePassword(){
        $user=Auth::user();
           //verifies the password entered if correct
           if (Hash::check($this->current_password,$user->password)) {

            //validates if the new password and confirmation matches
            $this->validate([
               'password' => ['required','confirmed'],
            ]);

            $user->password=Hash::make($this->password);
            $user->save();

            $this->reset(['current_password','password','password_confirmation']);

            session()->flash('password-change-success','You have successfully changed your password');
        }
        else
        $this->addError('current_password','The current password entered is incorrect');

    }
}
