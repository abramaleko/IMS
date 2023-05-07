<?php

use App\Http\Controllers\ContractsController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SharedDocsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
})->middleware(['auth','verified'])->name('dashboard');

//route for showing email verification notice
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


// defines a route  that will handle requests generated when the user clicks
// the email verification link that was emailed to them
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


//routes for resending email verification
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


require __DIR__.'/auth.php';


Route::prefix('investors')->middleware(['auth','verified'])->group(function () {

    Route::get('/new',[InvestorController::class,'index'])->name('investors.index');

    Route::get('/all',[InvestorController::class,'show'])->name('investors.show');

    Route::get('/{investor}/details',[InvestorController::class,'investorDetails'])->name('investor.details');

    Route::get('/{investor}/download/{download_id}',[InvestorController::class,'investorDownload'])->name('investor.download');

    Route::get('/{investor}/edit',[InvestorController::class,'editInvestor'])->name('investor.edit');

    Route::get('/{investor}/delete',[InvestorController::class,'deleteInvestor'])->name('investor.delete');
});


Route::prefix('contracts')->middleware(['auth','verified'])->group(function(){

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

Route::get('/profile',ProfileController::class)->middleware('auth')->name('user-profile');

Route::get('/admin/shared-docs',[SharedDocsController::class,'adminSharedDocs'])->name('admin.shared-docs.index');

Route::get('/shared-docs',[SharedDocsController::class,'getSharedDoc'])->name('shared-docs.index');

Route::get('/admin/upload/shared-docs',[SharedDocsController::class,'uploadSharedDocsPage'])->name('admin.shared-docs.upload');

Route::get('/shared-doc/view/{doc}',[SharedDocsController::class,'viewDoc'])->name('shared-document.view');

Route::get('/get/shared-doc/download/{doc}',[SharedDocsController::class,'downloadDoc'])->name('shared-document.download');
