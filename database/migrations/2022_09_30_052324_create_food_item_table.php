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
        Schema::create('food_item', function (Blueprint $table) {
            $table->id("fooditemid");
            $table->unsignedBigInteger("foodserviceid");
            $table->string('name');
            $table->string('photo');
            $table->text('description')->nullable();
            $table->string('rating')->nullable();
            $table->string('price');

            $table->set('status', ['available', 'not available', 'deleted']);
            $table->timestamps();

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
        Schema::dropIfExists('food_item');
    }
};
