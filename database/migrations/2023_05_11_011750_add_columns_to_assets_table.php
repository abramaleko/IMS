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
        Schema::table('assets', function (Blueprint $table) {
            //
            $table->boolean('staked')->after('payout_amount')->default(false);
            $table->boolean('gs_flag')->after('staked')->default(false);
            $table->boolean('cc_flag')->after('gs_flag')->default(false);
            $table->boolean('ex_flag')->after('cc_flag')->default(false);
            $table->boolean('uk_flag')->after('ex_flag')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assets', function (Blueprint $table) {
            //
        });
    }
};
