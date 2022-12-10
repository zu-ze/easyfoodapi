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
        Schema::create('task_package', function (Blueprint $table) {
            $table->id("taskpackageid");
            $table->unsignedBigInteger('deliverytaskid');
            $table->unsignedBigInteger('orderitemid');

            $table->set('status', ['pending', 'sent', 'delivered', 'deleted']);
            $table->timestamps();

            $table->foreign('deliverytaskid')->references('deliverytaskid')->on('delivery_task');
            $table->foreign('orderitemid')->references('orderitemid')->on('order_item');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_package');
    }
};
