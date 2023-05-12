<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommunityClaimController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified','twofactor','change-password']);
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        return view('community-reward');
    }
}
