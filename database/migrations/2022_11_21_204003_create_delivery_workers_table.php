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
        Schema::create('delivery_workers', function (Blueprint $table) {
            $table->id("deliveryworkerid");
            $table->unsignedBigInteger("userid");
            $table->unsignedBigInteger("foodserviceid");
            $table->set("status", ['pending', 'available', 'not available', 'deleted'])->default('pending');
            $table->timestamps();

            $table->foreign('userid')->references('userid')->on('users');
            $table->foreign('foodserviceid')->references('foodserviceid')->on('food_service');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_workers');
    }
};
