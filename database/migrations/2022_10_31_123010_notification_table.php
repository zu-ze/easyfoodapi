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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id("notificationid");
            $table->unsignedBigInteger('from');
            $table->string('to')->default('administrator');
            $table->string('image')->nullable()->default('default.png');
            $table->set('type', ['promotion', 'feed', 'register']);
            $table->string('content')->nullable();
            $table->set('status', ['pending', 'active', 'deleted'])->default('pending');
            $table->boolean('seen')->default(false);
            $table->timestamps();

            $table->foreign('from')->references('userid')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
