<?php

namespace App\Http\Livewire\Dashboards;

use App\Models\Actuals;
use App\Models\CommunityClaimPeriod;
use App\Models\Contracts;
use App\Models\Investors;
use App\Models\Projects;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;


class AdminDashboard extends Component
{
    public $withdrawalState,$allInvestors,$totalAmountInvested,$allActiveContracts;

    public $trendingProjects=[],$allProjects;

    public $topInvestors=[],$investorAssets=[],$allInvestorsGroupedRank=[];

    public function render()
    {
        return view('livewire.dashboards.admin-dashboard');
    }

    public function mount(){

       $this->withdrawalState=CommunityClaimPeriod::first()->value;
       $this->allInvestors=Investors::count();
       $this->totalAmountInvested=Contracts::sum('amount');
       $this->allActiveContracts=Contracts::where('status',true)->count();
       $this->allProjects=Projects::all();
       $this->calculateTrendingProject();
       $this->calculateTopInvestors();
    }

    private function calculateTrendingProject(){

        $allContracts=Contracts::count();


       if ($allContracts > 0) {
        foreach ($this->allProjects as $project) {
            $projectContracts=$project->contracts->count();

            $projectPercentage=($projectContracts/$allContracts) * 100;

            $projectStats=[
             'name' => $project->name,
             'percentage' =>round($projectPercentage,0,PHP_ROUND_HALF_UP),
              'color' => $project->color
            ];
            array_push($this->trendingProjects,$projectStats);
         }
       }
    }

    private function calculateTopInvestors(){
    /*
        Total actuals computation
        1- Group records by the same month&year,note in each month each project will have records
        2- After grouping in each group take each project (ngr*communtiy_reward)/100 and sum them
            then you will get the total actual
     */

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

        $investorsData=Investors::with(['contracts' => function ($query) {
            $query->select('id', 'project_id','investor_id');
        }, 'contracts.assets' => function ($query) {
            $query->select('id', 'asset_address', 'staked','contract_id','asset_id');
        },
         'contracts.assets.assetInfo'
        ])
        ->has('contracts.assets')
        ->select('id','investor_name')
        ->get()
        ->toArray();


        $investorContractInfo=[];
        foreach ($investorsData as $investor) {
            $data=[];
            $data['investor_id']=$investor['id'];
            $data['investor_name']=$investor['investor_name'];
            $data['investor_assets']=[];

              foreach ($investor['contracts'] as $contract) {
                  foreach ($contract['assets'] as $asset) {
                    $dataAssets=[]; //this will hold the contract assets for that contract after checking if asset is staked
                     if ($asset['staked']) {
                        $dataAssets=[
                            'asset_name'=> $asset['asset_info'] ['asset_name'],
                            'payout_amount'=> $asset['asset_info'] ['payout_amount'],
                        ];
                        array_push($data['investor_assets'],$dataAssets);
                     }
                  }
              }
              //check if data assets is not empty then push
              if (count($data['investor_assets']) > 0) {
                array_push($investorContractInfo,$data);
              }
        }

        $investorsGroupedRank=[];
        foreach ($total_actual as $actual) {
           $investorRank=[];
           $investorRank['year'] = $actual->year;
           $investorRank['month'] = $actual->month;
           $investorRank['rank']=[];
          foreach ($investorContractInfo as $info) {
            $name=$info['investor_name'];
            $t_actual=0;
             foreach ($info['investor_assets'] as $asset) {
                $amount=$asset['payout_amount'] * $actual->total_actual;
                $t_actual=$t_actual+$amount;
             }
             $investorRank['rank'] [$name] = $t_actual;
          }
           array_push($investorsGroupedRank,$investorRank);
        }
        $this->allInvestorsGroupedRank=$investorsGroupedRank;
        $this->topInvestors= [];

        foreach ($investorsGroupedRank as $entry) {
            foreach ($entry['rank'] as $name => $rank) {
                if (isset($summedRanks[$name])) {
                    $this->topInvestors[$name] += $rank;
                } else {
                    $this->topInvestors[$name] = $rank;
                }
            }
        }
        arsort($this->topInvestors);
    }

    public function getAssets($name){
        $this->reset('investorAssets');

        $investorData=Investors::with(['contracts.assets.assetInfo'])
        ->where('investor_name',$name)->first();

        $rawData=$investorData->toArray();

        foreach ($rawData['contracts'] as $contract) {
             foreach ($contract['assets'] as $asset) {
                array_push($this->investorAssets,[
                    'asset_type' => $asset['asset_info']['asset_type'],
                    'asset_address' => $asset['asset_address'],
                    'stake' => $asset['staked'],
                ]);
             }
        }
         $this->getRewardOverTime($name);
    }


    private function getRewardOverTime($name){
     $rewards=[];
       foreach ($this->allInvestorsGroupedRank as $investorsData) {
         if ($investorsData['rank'][$name]) {
          $monthName=Carbon::createFromFormat('m', $investorsData['month'])->format('F');
           array_push($rewards,[
            'date' => $monthName." ".$investorsData['year'],
            'reward' => $investorsData['rank'][$name]
           ]);
         }
       }
       $this->dispatchBrowserEvent('showSelectedInvestorRewardTrend',['rewards' => $rewards]);
    }
}
