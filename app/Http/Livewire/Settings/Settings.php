<?php

namespace App\Http\Livewire\Settings;

use App\Models\Offices;
use App\Models\Projects;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Events\Registered;


class Settings extends Component
{
   public $roles,$role_name;
   public $projects,$project_name,$selectedProject;
   public $users,$f_name,$l_name,$email;
    public function render()
    {
        return view('livewire.settings.settings');
    }

    public function mount(){

        $this->roles=Role::all();
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

    public function updateProject(){
        $this->validate([
            'selectedProject.name' => 'required|string'
        ]);

        $project=Projects::find($this->selectedProject['id']);
        $project->name=$this->selectedProject['name'];
        $project->save();

        $this->projects=Projects::all();

        session()->flash('ProjectUpdate', 'Successfully updated project name');

        $this->dispatchBrowserEvent('closeEditProjectModal');
    }

    public function deleteProject($project_id)
    {
        Projects::find($project_id)->delete();

        //update project
        $this->projects=Projects::all();
    }

    public function newUser()
    {
        $this->validate([
            'f_name' => 'required|string|max:50',
            'l_name' => 'required|string|max:50',
            'email' => 'required|unique:users',
            ]);

            $f_name=ucfirst($this->f_name);
            $l_name=ucfirst($this->l_name);

                //username innitals f.lastname
                $username=substr($f_name,0,1).'.'.$l_name;
                $password=Hash::make(config('app.staff_password'));

                $user=User::create([
                    'fname' => $f_name,
                    'lname' => $l_name,
                    'email' => $this->email,
                    'username' => $username,
                    'password' => $password,
                    'is_password_default'=> true,
                ]);

                $user->assignRole('Staff');

                //dispatches this event which will send the user an email with their login credentials
                event(new Registered($user));

                //update users
                $this->users=User::all();

                session()->flash('CreatedUser', 'Successfully created user and sent email with credentials to registered staff');

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
