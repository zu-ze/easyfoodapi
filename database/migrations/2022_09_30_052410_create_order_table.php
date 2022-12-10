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
        Schema::create('order', function (Blueprint $table) {
            $table->id("orderid");
            $table->unsignedBigInteger("userid");
            $table->text('dropOffLocation')->nullable();
            $table->string('locationGoogle')->nullable();
            $table->string('locationDescription')->nullable();

            $table->set('status', ['pending', 'delivered', 'deleted']);
            $table->timestamps();

            $table->foreign('userid')->references('userid')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
};
