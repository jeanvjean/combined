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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('account_type')->nullable();
            $table->string('about')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('brand')->nullable();
            $table->string('work_email')->nullable();
            $table->string('website')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('sex');
            $table->string('img');
            $table->string('slug');
            $table->string('email')->unique();
            $table->string('password');
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
