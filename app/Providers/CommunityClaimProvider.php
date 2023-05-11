<?php

namespace App\Providers;

use App\Models\CommunityClaimPeriod;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class CommunityClaimProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable('community_claim_period')) {
            $community_claim_period=CommunityClaimPeriod::first()->value;
            View::share('community_claim_period', $community_claim_period);
        }

    }
}
