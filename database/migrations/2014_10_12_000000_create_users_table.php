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
        Schema::create('users', function (Blueprint $table) {
            $table->id("userid");
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phonenumber')->unique();
            $table->string('avatar')->unique()->nullable();
            $table->string('password');
            $table->set('role', ['customer', 'food service owner', 'delivery worker', 'administrator'])->default('customer');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_number_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
