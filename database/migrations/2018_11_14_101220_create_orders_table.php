<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->text('note')->nullable();
            $table->float('total')->nullable();
            $table->timestamp('order_day')->nullable();
            $table->integer('payment_status')->nullable();
            $table->timestamp('payment_day')->nullable();
            $table->integer('deliver_status')->nullable();
            $table->timestamp('deliver_day')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('payment_method_id')->unsigned();
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
