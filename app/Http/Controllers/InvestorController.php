<?php

namespace App\Http\Controllers;

use App\Models\Investors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvestorController extends Controller
{
    //

    //form for registering the investors data
    public function index()
    {
        return view('investors.index');
    }

    //shows the registered investors
    public function show()
    {
        return view('investors.show',[
            'investors' => Investors::orderBy('id','desc')->get()
        ]);
    }

    public function investorDetails(Investors $investor)
    {
       return view('investors.investor-details',[
           'investor' => $investor
       ]);
    }

    public function editInvestor($investor)
     {
         return view('investors.edit-investor',[
             'investor' => $investor
         ]);
     }


    public function investorDownload(Investors $investor, $download_id){

        // If download id =1 ->download investor id copy
        //            id=2 -> download next of kin id copy

        if ($download_id == 1) {
            return response()->download(storage_path('app/'.$investor->id_path));
        }

        if ($download_id==2) {
            return response()->download(storage_path('app/'.$investor->nxt_kin_id_path));
        }

    }

    public function deleteInvestor(Investors $investor)
    {

        if ($investor->id_path) {
            Storage::delete(storage_path('app/'.$investor->id_path));
        }

        if ($investor->id_path) {
            Storage::delete(storage_path('app/'.$investor->id_path));
        }

        $investor->delete();

        return redirect()->route('investors.show')->with('success','Successfully deleted investor');

    }
}