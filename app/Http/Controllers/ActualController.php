<?php

namespace App\Http\Controllers;

use App\Models\Actuals;
use Illuminate\Http\Request;

class ActualController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified','twofactor','change-password']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Actuals.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Actuals.create');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $actual=Actuals::find($id);
       return view('Actuals.edit',['actual' =>  $actual]);
    }

}
