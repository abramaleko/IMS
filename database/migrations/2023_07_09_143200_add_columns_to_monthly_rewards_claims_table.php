<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monthly_reward_claims', function (Blueprint $table) {
            //
            $table->string('facebook')->nullable()->after('amount');
            $table->string('linkedin')->nullable()->after('facebook');
            $table->string('twitter')->nullable()->after('linkedin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monthly_rewards_claims', function (Blueprint $table) {
            //
        });
    }
};
