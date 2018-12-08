<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('admin');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 60)->nullable(false);
            $table->string('password', 250)->nullable(false);
            $table->timestamps();
        });
    }
}
