<?php

namespace App\Http\Livewire\Dashboards;

use App\Models\CommunityClaimPeriod;
use App\Models\Investors;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Carbon\Carbon;


class InvestorDashboard extends Component
{
    public $withdrawalState,$investorAssets=[],$investorRawData,$investorRewards=[];


    public function render()
    {
        return view('livewire.dashboards.investor-dashboard');
    }

    public function mount(){
        $this->withdrawalState=CommunityClaimPeriod::first()->value;
        $this->getContractAssets();
        $this->getRewardOverTime();
    }

    private function getContractAssets(){

        $investorData=Investors::with(['contracts.assets.assetInfo'])->find(Auth::user()->investor_id);

        $this->investorRawData=$investorData->toArray();

        foreach ($this->investorRawData['contracts'] as $contract) {
            foreach ($contract['assets'] as $asset) {
               array_push($this->investorAssets,[
                   'asset_type' => $asset['asset_info']['asset_type'],
                   'asset_address' => $asset['asset_address'],
                   'stake' => $asset['staked'],
                   'payout_amount' =>  $asset['asset_info']['payout_amount']
               ]);
            }
       }
    }


    private function getRewardOverTime(){
      //calculate total actual
      $total_actual = DB::table('actuals')
        ->join(DB::raw('(SELECT MIN(id) AS id FROM actuals GROUP BY project_id, month, year) AS grouped'), function ($join) {
            $join->on('actuals.id', '=', 'grouped.id');
        })
        ->join('projects', 'actuals.project_id', '=', 'projects.id')
        ->groupBy('actuals.year', 'actuals.month')
        ->select(
            'actuals.year',
            'actuals.month',
            DB::raw('SUM(actuals.ngr * actuals.community_share) / 100 AS total_actual')
        )
        ->get();

        //calculate reward level over time
        $dataAssets=[]; //holds the staked assets
        foreach($this->investorAssets as $asset){
            if ($asset['stake']) {
              array_push($dataAssets,[
                'asset_name'=> $asset['asset_type'],
                'payout_amount'=> $asset['payout_amount'],
              ]);
            }
        }

        $investorGroupedRewards=[]; //groups them based on year and month
        foreach ($total_actual as $actual) {
            $investorReward=[];
            $investorReward['year'] = $actual->year;
            $investorReward['month'] = $actual->month;

            $t_actual=0;
            foreach ($dataAssets as $asset) {
                $amount=$asset['payout_amount'] * $actual->total_actual;
                $t_actual=$t_actual+$amount;
            }
            $investorReward['reward']=$t_actual;
            array_push($investorGroupedRewards,$investorReward);
        }

        $this->investorRewards=[];
       foreach ($investorGroupedRewards as $investorsData) {
          $monthName=Carbon::createFromFormat('m', $investorsData['month'])->format('F');
           array_push($this->investorRewards,[
            'date' => $monthName." ".$investorsData['year'],
            'reward' => $investorsData['reward']
           ]);
       }

    }
}
