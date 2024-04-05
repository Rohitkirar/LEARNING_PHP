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
        Schema::create('usersData', function (Blueprint $table) {
            $table->id();
            $table->string('first_name' , 200);
            $table->string('last_name' , 250);
            $table->string('email' , 255) ;
            $table->string('number' , 25);
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
        Schema::dropIfExists('usersData');
    }
};
