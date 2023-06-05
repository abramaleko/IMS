<?php

namespace App\Http\Livewire\Dashboards;

use App\Models\CommunityClaimPeriod;
use App\Models\Contracts;
use App\Models\Investors;
use App\Models\Projects;
use Livewire\Component;

class AdminDashboard extends Component
{
    public $withdrawalState,$allInvestors,$totalAmountInvested,$allActiveContracts;

    public $trendingProjects=[];

    public function render()
    {
        return view('livewire.dashboards.admin-dashboard');
    }

    public function mount(){

       $this->withdrawalState=CommunityClaimPeriod::first()->value;
       $this->allInvestors=Investors::count();
       $this->totalAmountInvested=Contracts::sum('amount');
       $this->allActiveContracts=Contracts::where('status',true)->count();
       $this->calculateTrendingProject();
    }

    private function calculateTrendingProject(){

        $allContracts=Contracts::count();

        $allProjects=Projects::all();

       if ($allContracts > 0) {
        foreach ($allProjects as $project) {
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
}
