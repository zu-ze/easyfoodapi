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
        Schema::create('delivery_task', function (Blueprint $table) {
            $table->id("deliverytaskid");
            $table->unsignedBigInteger('customerid');
            $table->unsignedBigInteger('workerid');
            $table->unsignedBigInteger('foodserviceid');
            $table->string('name')->nullable();
            $table->text('dropofflocation');

            $table->set('status', ['pending', 'sent', 'delivered', 'deleted'])->default('pending');
            $table->timestamps();

            $table->foreign('customerid')->references('userid')->on('users');
            $table->foreign('workerid')->references('userid')->on('users');
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
        Schema::dropIfExists('delivery_task');
    }
};
