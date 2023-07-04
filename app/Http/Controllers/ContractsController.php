<?php

namespace App\Http\Controllers;

use App\Models\ContractAssets;
use App\Models\Contracts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContractsController extends Controller
{
    //shows the all contracts
    public function index()
    {
      return view('contracts.index',[
          'contracts' => Contracts::with(['investor','project'])->orderBy('id','desc')->get()
      ]);
    }

    public function newContract()
    {
        return view('contracts.new-contract');
    }

    public function contractDetails(Contracts $contract)
    {
        return view('contracts.contract-details',[
            'contract' => $contract,
        ]);
    }

    public function contractEdit(Contracts $contract)
    {
        return view('contracts.edit-contract',[
            'contract_id' => $contract->id,
        ]);
    }

    public function downloadAttachment(Contracts $contract, $type)
    {
       if ($type=== "payment_slips") {
           $files=unserialize($contract->receipt_attachments);

           //create a zip file for the payment slips
           $zip_name='tmp_files/'.$contract->investor->investor_name.' payment slips.zip';
           $zip = new \ZipArchive();
           $zip->open($zip_name, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
           //include the files
           foreach ($files as $file) {
            $zip->addFile(storage_path('app/'.$file),$file);
           }
           $zip->close();

        return response()->download($zip_name);
       }

       if ($type=== "contract_documents") {

            $files=unserialize($contract->contract_attachments);

            //create a zip file for the payment slips
            $zip_name='tmp_files/'.$contract->investor->investor_name.' contract docs.zip';
            $zip = new \ZipArchive();
            $zip->open($zip_name, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
            //include the files
            foreach ($files as $file) {
             $zip->addFile(storage_path('app/'.$file),$file);
            }
            $zip->close();

         return response()->download($zip_name);
    }
    }

    public function endContract(Request $request)
    {

    $this->validate($request,[
               'contract_termination' => 'required|string',
           ]);

       $contract=Contracts::find($request->contract_id);
       $contract->termination_description=$request->contract_termination;
       $contract->status=false;
       $contract->terminated_on=Carbon::now();
       $contract->save();

       return back();
    }

    public function deleteContract(Contracts $contract)
    {
        $contract->delete();

        return redirect()->route('contracts.index')->with('success','Contract Deleted Successfully');

    }

    public function verifyContractAssetsPage(){
    $unverifiedContractAssets=ContractAssets::with(['contract.project','contract.investor','assetInfo'])
                              ->where('verified',false)
                              ->get();
       return view('contracts.verify-assets',['unverifiedContractAssets' => $unverifiedContractAssets]);
    }

    public function verifyContractAssets(ContractAssets $asset){

     $asset->verified=true;
     $asset->save();

     return redirect()->route('contract.asset-verify.index')->with('success','Asset verified successfully');

    }

    public function verifiedAssets(){
        $verifiedContractAssets=ContractAssets::with(['contract.project','contract.investor','assetInfo'])
        ->where('verified',true)
        ->get();

        return view('contracts.verified-assets',['verifiedContractAssets' => $verifiedContractAssets]);
    }
}
