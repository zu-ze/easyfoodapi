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
        Schema::create('food_service', function (Blueprint $table) {
            $table->id("foodserviceid");
            $table->unsignedBigInteger("userid");
            $table->string('name')->unique();
            $table->string('paypalemail')->nullable()->unique();
            $table->string('photo')->nullable()->default('default.png');
            $table->string('rating')->nullable()->default('0');
            $table->text('location')->nullable()->default('{lat: 15,lng: 78}');

            $table->set('status', ['pending', 'active', 'deleted'])->default('pending');
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
        Schema::dropIfExists('food_service');
    }
};
