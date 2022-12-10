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
        Schema::create('order_item', function (Blueprint $table) {
            $table->id("orderitemid");
            $table->unsignedBigInteger("orderid");
            $table->unsignedBigInteger("fooditemid");
            $table->string('quantity');
            $table->set('status', ['pending', "cooking", "sent", 'delivered', 'deleted'])->default('pending');
            $table->timestamps();

            $table->foreign('orderid')->references('orderid')->on('order');
            $table->foreign('fooditemid')->references('fooditemid')->on('food_item');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_item');
    }
};
