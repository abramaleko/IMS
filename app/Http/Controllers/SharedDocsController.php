<?php

namespace App\Http\Controllers;

use App\Models\SharedDocs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function viewDoc(SharedDocs $doc){
        return view('sharedDocs.view',['doc'=>$doc]);
    }

    public function downloadDoc(SharedDocs $doc){
     $file=storage_path('app/'.$doc->filepath);
      return response()->download($file);

    }
}
