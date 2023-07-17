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

    $validator=Validator::make($request->all(), [
        'user_id' => 'required',
        'amount' => 'required',
        'transaction_id' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'error' => 'validation failed'
        ]);
    }

    CAYCSWAP::create([
        'user_id' => $request->user_id,
        'transaction_id' => $request->transaction_id,
         'amount' => $request->amount,
    ]);
    return response()->json([
        'status' => 200,
        'message' => 'CAYC info stored successfully',
    ]);
});


