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
        Schema::table('actuals', function (Blueprint $table) {
            //
            $table->dropColumn('gs_ngr');
            $table->dropColumn('gs_community_allocation');
            $table->dropColumn('cc_ngr');
            $table->dropColumn('cc_community_allocation');
            $table->dropColumn('ex_ngr');
            $table->dropColumn('ex_community_allocation');
            $table->dropColumn('uk_ngr');
            $table->dropColumn('uk_community_allocation');


            $table->decimal('ngr', 10, 2);
            $table->decimal('community_share', 10, 2);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actuals', function (Blueprint $table) {
            //
        });
    }
};
