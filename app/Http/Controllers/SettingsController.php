<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware(['auth','verified','twofactor','change-password']);
    }


    protected function checkPermission()
    {
        //if user does not have the permissions
        if (! auth()->user()->can('Manage Settings')) {
            abort(403, 'Unauthorized.');
        }
    }

    public function index()
    {
        $this->checkPermission();

        return view('Settings.index');
    }

    public function rolePermissions($role)
    {
        $this->checkPermission();

        return view('Settings.role',['role' => $role]);

    }
}
