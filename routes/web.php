<?php

use App\Http\Controllers\ContractsController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/','/login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::prefix('investors')->middleware('auth')->group(function () {

    Route::get('/new',[InvestorController::class,'index'])->name('investors.index');

    Route::get('/all',[InvestorController::class,'show'])->name('investors.show');

    Route::get('/{investor}/details',[InvestorController::class,'investorDetails'])->name('investor.details');

    Route::get('/{investor}/download/{download_id}',[InvestorController::class,'investorDownload'])->name('investor.download');

    Route::get('/{investor}/edit',[InvestorController::class,'editInvestor'])->name('investor.edit');

    Route::get('/{investor}/delete',[InvestorController::class,'deleteInvestor'])->name('investor.delete');
});


Route::prefix('contracts')->middleware('auth')->group(function(){

    Route::get('/all',[ContractsController::class,'index'])->name('contracts.index');

    Route::get('/new',[ContractsController::class,'newContract'])->name('contract.new');

    Route::get('/{contract}/details',[ContractsController::class,'contractDetails'])->name('contract.details');

    Route::get('/{contract}/edit',[ContractsController::class,'contractEdit'])->name('contract.edit');

    Route::get('/contract/{contract}/download/{type}',[ContractsController::class,'downloadAttachment'])->name('contract.download');

    Route::post('/contract/end',[ContractsController::class,'endContract'])->name('contract.end');

    Route::delete('/contract/{contract}/delete',[ContractsController::class,'deleteContract'])->name('contract.delete');

});

Route::get('/settings',[SettingsController::class,'index'])->name('settings');

Route::get('/settings/{role}/role',[SettingsController::class,'rolePermissions'])->name('settings.role-permissions');
