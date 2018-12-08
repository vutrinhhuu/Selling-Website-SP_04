<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateForeignKeyOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_details', function ($table) {
            $table->dropForeign(['product_id']);

            $table->foreign('product_id')
                ->references('id')->on('size_colors')
                ->onDelete('cascade');

            $table->renameColumn('product_id', 'size_color_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_details', function ($table) {
            $table->dropForeign(['size_color_id']);

            $table->foreign('size_color_id')
                ->references('id')->on('products')
                ->onDelete('cascade');

            $table->renameColumn('size_color_id', 'product_id');
        });
    }
}
