<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_code')->unique()->nullable(false);
            $table->string('name', 200)->nullable(false);
            $table->string('meta_title', 200)->nullable();
            $table->text('description')->nullable();
            $table->float('unit_price')->nullable();
            $table->float('promotion_price')->nullable();
            $table->string('representative_image', 200)->nullable();
            $table->integer('status')->nullable();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('products');
    }
}
