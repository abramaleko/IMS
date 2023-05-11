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
        Schema::create('actuals', function (Blueprint $table) {
            $table->id();
            $table->year('year');
            $table->tinyInteger('month');
            $table->decimal('gs_ngr', 10, 2);
            $table->decimal('gs_community_allocation', 4, 1);
            $table->decimal('cc_ngr', 10, 2);
            $table->decimal('cc_community_allocation', 4, 1);
            $table->decimal('ex_ngr', 10, 2);
            $table->decimal('ex_community_allocation', 4, 1);
            $table->decimal('uk_ngr', 10, 2);
            $table->decimal('uk_community_allocation', 4, 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actuals');
    }
};
