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
        Schema::create('claim_messages', function (Blueprint $table) {
            $table->id();
            $table->string('link');
            $table->longText('message');
            $table->timestamps();
        });

        $this->seedDefaultRecord();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('claim_messages');
    }

    public function seedDefaultRecord()
{
    DB::table('claim_messages')->insert([
        'link' => 'https://github.com/abramaleko',
        'message' => 'Hey,I just earned my claim reward on IMS',
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}
};
