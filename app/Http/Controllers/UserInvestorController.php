<?php

namespace App\Http\Controllers;

use App\Models\Contracts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInvestorController extends Controller
{

    public function __construct(){
        $this->middleware(['auth','verified','twofactor','change-password']);
    }

    public function investorProfile(){

        return view('investors.investor-details',[
            'investor' => Auth::user()->investor
        ]);
    }

    public function investorContracts(){

        return view('investors.investor-contracts',[
            'contracts' => Contracts::with(['investor','project'])
            ->where('investor_id',Auth::user()->investor->id)
            ->orderBy('id','desc')->get()
        ]);
    }

    public function investorContractDetails(Contracts $contract){
       return view('investors.investor-contract-details',[
        'contract' => $contract,
       ]);
    }

    public function editContract($id){
        return view ('investors.user-investor-edit',[
            'contract_id' => $id,
        ]);
    }
}
