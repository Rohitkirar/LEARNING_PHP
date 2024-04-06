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
        Schema::table('usersdata', function (Blueprint $table) {
            //
            $table->string('first_name' , 150)->change();
            $table->string('last_name' , 150)->change();
            $table->string('email' , 100)->change();
            $table->string('number' , 100)->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usersdata', function (Blueprint $table) {
            //
            $table->string('first_name' , 200)->change();
            $table->string('last_name' , 250)->change();
            $table->string('email' , 255)->change();
            $table->string('number' , 25)->change();

        });
    }
};
