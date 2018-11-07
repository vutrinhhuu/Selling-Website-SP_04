<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 60)->nullable(false);
<<<<<<< 9ee31ba959505e27ceec9e5c0874732cecf8dbbd
            $table->string('password', 250)->nullable(false);
=======
            $table->string('password', 32)->nullable(false);
>>>>>>> add database
            $table->string('email')->unique()->nullable(false);
            $table->string('fullname', 60)->nullable();
            $table->string('address', 200)->nullable();
            $table->string('phone', 60)->nullable();
            $table->integer('status')->nullable();
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
}
