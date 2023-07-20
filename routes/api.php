<?php

use App\Http\Controllers\Api\CaycSwapsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\CAYCSWAP;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/record-swaps',function(Request $request){
    
    $new=new CAYCSWAP();
    $new->user_id=$request->user_id;
    $new->transaction_id=$request->transaction_id;
    $new->amount=$request->amount;
    $new->save();
    return response()->json([
        'status' => 200,
        'message' => 'CAYC info stored successfully',
    ]);
});


