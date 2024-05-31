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
        Schema::create('gift_card_products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("code");
            $table->tinyInteger("cashback_percentage")->unsigned();
            $table->tinyInteger("user_cashback_percentage")->unsigned();
            $table->text("description");
            $table->enum("status" , ["active" , "inactive"]);
            $table->text("image");
            $table->integer("max_price");
            $table->integer("min_price");
            $table->Integer("sequence");
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
        Schema::dropIfExists('gift_card_products');
    }
};
