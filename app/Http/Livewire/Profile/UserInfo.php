<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class UserInfo extends Component
{
    public $first_name,$last_name,$username,$email,$user_id;

    public function render()
    {
        return view('livewire.profile.user-info');
    }

    public function mount(){
       $this->getUserInfo();
    }

    public function getUserInfo(){
        $this->user_id=Auth::user()->id;
        $this->first_name=Auth::user()->fname;
        $this->last_name=Auth::user()->lname;
        $this->username=Auth::user()->username;
        $this->email=Auth::user()->email;
    }

    public function updateProfileInfo(){

        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$this->user_id,
        ];

        $this->validate($rules);

        $username=substr($this->first_name,0,1).'.'.$this->last_name;

           $user=Auth::user();
           $user->fname=$this->first_name;
           $user->lname=$this->last_name;
           $user->email=$this->email;
           $user->username=$username;
           $user->save();

           session()->flash('updateUserInfo', 'Successfully Updated user info');

           $this->getUserInfo();

    }
}
