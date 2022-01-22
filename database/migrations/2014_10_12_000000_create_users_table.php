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
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('matricno')->unique();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('libraryId')->unique();
            $table->string('nationalId')->unique();
            $table->string('password');
            $table->string('status')->default('active');
            $table->integer('rating')->default(1);
            $table->dateTime('rated_on');
            $table->dateTime('suspended_till')->nullable();
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
