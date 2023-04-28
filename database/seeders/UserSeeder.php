<?php

namespace Database\Seeders;

use App\Models\Offices;
use App\Models\User;
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

        $office=Offices::create([
            'location' => 'Admin',
             'min_amount' => 500000,
             'max_amount' => 500000000
        ]);

        $user=User::create([
            'fname' => 'Super',
            'lname' => 'Administrator',
            'email' => 'admin@domain.com',
            'username' => 'S.Admin',
            'office_id' => $office->id,
            'is_password_default' => false,
            'password' => Hash::make('Admin@2023'),
        ]);

        $user->assignRole('Super Administrator');
    }
}
