<?php

use App\Http\Controllers\ActualController;
use App\Http\Controllers\CommunityClaimController;
use App\Http\Controllers\ContractsController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SharedDocsController;
use App\Http\Controllers\SwapCaycController;
use App\Http\Controllers\UserInvestorController;
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
})->middleware(['auth','verified','twofactor','change-password'])->name('dashboard');


require __DIR__.'/auth.php';


Route::prefix('admin/investors')->middleware(['auth','verified','twofactor','change-password'])->group(function () {

    Route::get('/new',[InvestorController::class,'index'])->name('investors.index');

    Route::get('/all',[InvestorController::class,'show'])->name('investors.show');

    Route::get('/{investor}/details',[InvestorController::class,'investorDetails'])->name('investor.details');

    Route::get('/{investor}/download/{download_id}',[InvestorController::class,'investorDownload'])->name('investor.download');

    Route::get('/{investor}/edit',[InvestorController::class,'editInvestor'])->name('investor.edit');

    Route::get('/{investor}/delete',[InvestorController::class,'deleteInvestor'])->name('investor.delete');
});


Route::prefix('contracts')->middleware(['auth','verified','twofactor','change-password'])->group(function(){

    Route::get('/all',[ContractsController::class,'index'])->name('contracts.index');

    Route::get('/new',[ContractsController::class,'newContract'])->name('contract.new');

    Route::get('/{contract}/details',[ContractsController::class,'contractDetails'])->name('contract.details');

    Route::get('/{contract}/edit',[ContractsController::class,'contractEdit'])->name('contract.edit');

    Route::get('/contract/{contract}/download/{type}',[ContractsController::class,'downloadAttachment'])->name('contract.download');

    Route::post('/contract/end',[ContractsController::class,'endContract'])->name('contract.end');

    Route::delete('/contract/{contract}/delete',[ContractsController::class,'deleteContract'])->name('contract.delete');

    Route::get('/contract-asset-verification',[ContractsController::class,'verifyContractAssetsPage'])->name('contract.asset-verify.index');

    Route::get('/contract/{asset}/verify-asset',[ContractsController::class,'verifyContractAssets'])->name('contract.asset-verify');

    Route::get('/contract/verified-assets',[ContractsController::class,'verifiedAssets'])->name('contract.asset-verified');

});

Route::get('/settings',[SettingsController::class,'index'])->name('settings');

Route::get('/settings/{role}/role',[SettingsController::class,'rolePermissions'])->name('settings.role-permissions');

Route::get('/profile',ProfileController::class)->middleware('auth')->name('user-profile');

Route::get('/admin/shared-docs',[SharedDocsController::class,'adminSharedDocs'])->name('admin.shared-docs.index');

Route::get('/shared-docs',[SharedDocsController::class,'getSharedDoc'])->name('shared-docs.index');

Route::get('/admin/upload/shared-docs',[SharedDocsController::class,'uploadSharedDocsPage'])->name('admin.shared-docs.upload');

Route::get('/shared-doc/view/{doc}',[SharedDocsController::class,'viewDoc'])->name('shared-document.view');

Route::get('/get/shared-doc/download/{doc}',[SharedDocsController::class,'downloadDoc'])->name('shared-document.download');

Route::get('/community-claim-reward',CommunityClaimController::class)->name('claim.community-reward');

Route::resource('/actuals', ActualController::class)->only(['create','index','edit']);


Route::group([],function(){
    Route::get('/investor-profile',[UserInvestorController::class,'investorProfile'])->name('user.investment-profile');

    Route::get('/investor-contracts',[UserInvestorController::class,'investorContracts'])->name('user.investment-contracts');

    Route::get('/investor-contract/{contract}/details',[UserInvestorController::class,'investorContractDetails'])->name('user.investment-contracts-details');

    Route::get('/investor-contract/{id}/edit',[UserInvestorController::class,'editContract'])->name('user.investment-profile.edit');
});

Route::get('/swap-cayc',[SwapCaycController::class,'index'])->name('swap-cayc.index');
