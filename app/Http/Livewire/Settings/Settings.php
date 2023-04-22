<?php

namespace App\Http\Livewire\Settings;

use App\Models\Offices;
use App\Models\Projects;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Settings extends Component
{
   public $roles,$role_name;
   public $offices,$location,$min_amount,$max_amount;
   public $projects,$project_name;
   public $users,$f_name,$l_name,$a_role="",$a_office="";
    public function render()
    {
        return view('livewire.settings.settings');
    }

    public function mount(){

        $this->roles=Role::all();
        $this->offices=Offices::all();
        $this->projects=Projects::all();
        $this->users=User::all();

    }

    public function newRole()
    {
        $this->validate([
            'role_name' => 'required|string'
        ]);

        Role::create(['name'=>ucfirst($this->role_name)]);


        $this->reset('role_name');

        //update roles
        $this->roles=Role::all();

        $this->dispatchBrowserEvent('closeRoleModal');

    }

    public function deleteRole($role_id)
    {
        Role::findById($role_id)->delete();

        //update roles
        $this->roles=Role::all();

    }

    public function newLocation()
    {
        $this->validate([
            'location' => 'required|string',
            'min_amount' => 'required|integer',
            'max_amount' => 'required|integer'

        ]);

        Offices::create([
            'location'=>ucfirst($this->location),
             'min_amount'=> $this->min_amount,
             'max_amount' => $this->max_amount
        ]);


        $this->reset('location','min_amount','max_amount');

        //update offices
        $this->offices=Offices::all();

        $this->dispatchBrowserEvent('closeOfficeModal');
    }

    public function deleteOffice($office_id)
    {
        Offices::find($office_id)->delete();

        //update offices
        $this->offices=Offices::all();

    }

    public function newProject()
    {
        $this->validate([
            'project_name' => 'required|string'
        ]);

        Projects::create(['name'=>ucfirst($this->project_name)]);


        $this->reset('project_name');

        //update project
        $this->projects=Projects::all();

        $this->dispatchBrowserEvent('closeProjectModal');

    }

    public function deleteProject($project_id)
    {
        Projects::find($project_id)->delete();

        //update project
        $this->projects=Projects::all();
    }

    public function newUser()
    {
        // dd($this->a_role);
        $this->validate([
            'f_name' => 'required|string|max:50',
            'l_name' => 'required|string|max:50',
            'a_role' => 'required',
            'a_office' => 'required'
            ]);

            $f_name=ucfirst($this->f_name);
            $l_name=ucfirst($this->l_name);

                $full_name=$f_name.' '.$l_name;
                //username innitals f.lastname
                $username=substr($f_name,0,1).'.'.$l_name;
                $password=Hash::make('Staff@2023');

                $user=User::create([
                    'name' => $f_name." ".$l_name,
                    'username' => $username,
                    'password' => $password,
                    'office_id' => $this->a_office,
                    'is_password_default'=> true,
                ]);

                $user->assignRole($this->a_role);

                //update users
                $this->users=User::all();


                $this->dispatchBrowserEvent('closeUserModal');
     }

     public function deleteUser(User $user){
        //check if user is administrator
        if ($user->hasRole('Super Administrator')) {
            session()->flash('deleteUserError', 'You can not delete a Super Adminstrator');
            return false;
        }

         $user->delete();
         session()->flash('deleteUser', 'You have deleted user successfully');

        //update users
        $this->users=User::all();
     }





}
