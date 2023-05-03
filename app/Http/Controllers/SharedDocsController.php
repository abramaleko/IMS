<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SharedDocsController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function adminSharedDocs(){
        return view('sharedDocs.admin-index');
    }

    public function uploadSharedDocsPage(){
        return view('sharedDocs.admin-upload');
    }
}
