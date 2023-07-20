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
        Schema::create('cayc_swaps', function (Blueprint $table) {
            $table->id();
            $table->longText('transaction_id');
            $table->foreignId('user_id')->constrained();
            $table->unsignedDecimal('amount', $totalDigits = 8, $decimalPlaces = 2);
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
        Schema::dropIfExists('cayc_swaps');
    }
};
