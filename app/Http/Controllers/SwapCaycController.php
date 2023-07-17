<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SwapCaycController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth','verified','twofactor','change-password']);
    }

    public function index(){
        return view('swapCayc.index');
    }
}
