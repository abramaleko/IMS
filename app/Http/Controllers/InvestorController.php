<?php

namespace App\Http\Controllers;

use App\Models\Investors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        if ($download_id == Investors::investorId) {
            return response()->download(storage_path('app/'.$investor->id_path));
        }

        if ($download_id == Investors::kinId) {
            return response()->download(storage_path('app/'.$investor->nxt_kin_id_path));
        }

    }

    public function deleteInvestor(Investors $investor)
    {

        $transaction=DB::transaction(function () use ($investor) {
            //if the investor has contracts
            if ($investor->contracts) {
                //permently deletes the investor contracts
                foreach ($investor->contracts as $contract) {
                    $contract->forceDelete();
                }

                // To be added contracts deletes attachments
            }


            //deletes the investor attachments
            if ($investor->id_path) {
                Storage::delete(storage_path('app/'.$investor->id_path));
            }
            $investor->delete();

            return true;
        });

        if ($transaction) {
            return redirect()->route('investors.show')->with('success','Successfully deleted investor');
        }
        else {
         abort(404);
        }
    }
}
