<?php

namespace App\Http\Controllers;

use App\Models\SharedDocs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SharedDocsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth','verified','twofactor','change-password']);
    }

    public function adminSharedDocs(){
        return view('sharedDocs.admin-index');
    }

    public function getSharedDoc(){

        $currentDate=Carbon::now();
        $docs=SharedDocs::whereDate('valid_untill', '>', Carbon::now())
        ->orderBy('id','desc')
        ->get();
        return view('sharedDocs.index',['docs' => $docs]);
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
