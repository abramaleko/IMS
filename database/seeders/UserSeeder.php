<?php

namespace Database\Seeders;

use App\Models\Offices;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * This seeder will import the admin roles, permissions for you to start up your application

     */
    public function run()
    {
        //defines the permissions
        $permissionNames = [
            'Manage Investors',
            'Manage Settings',
            'Manage Contracts',
            'Manage Shared Documents',
            'Manage Actuals',
        ];

        //create permissions for the app
        $permissions = [];
        foreach ($permissionNames as $name) {
            $permission = Permission::create(['name' => $name]);
            $permissions[] = $permission; //pushes to the array
        }

        //create a role super administrator and assings to permissions decaled above
        $role = Role::create(['name' => 'Super Administrator']);
        $role->givePermissionTo($permissions);

        $user=User::create([
            'fname' => 'Super',
            'lname' => 'Administrator',
            'email' => 'admin@domain.com',
            'email_verified_at' => Carbon::now(),
            'username' => 'S.Admin',
            'is_password_default' => false,
            'password' => Hash::make('Admin@2023'),
        ]);

        $user->assignRole('Super Administrator');

        /*
        creates permissions for investors
        assign permissions to a role of investor
        */
        $permissionNames=[
            'View Contracts',
            'View Investor Profile',
            'View Shared Documents',
            'View Community Claim Page',
        ];
        $permissions = [];
        foreach ($permissionNames as $name) {
            $permission = Permission::create(['name' => $name]);
            $permissions[] = $permission; //pushes to the array
        }
        $role = Role::create(['name' => 'Investor']);
        $role->givePermissionTo($permissions);

        /*creates a new role investor which you
        permissions to add in the admin settings
        page
        */
        $role = Role::create(['name' => 'Staff']);
    }
}
