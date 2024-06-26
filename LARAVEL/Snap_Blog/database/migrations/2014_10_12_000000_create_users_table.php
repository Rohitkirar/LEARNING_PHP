<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('gender' , ['male' , 'female' , 'other']);
            $table->date('date_of_birth');
            $table->string('email')->unique();
            $table->string('number')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('role' , ['admin' , 'user'])->default('user');
            $table->timestamps();
            $table->softDeletes();
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