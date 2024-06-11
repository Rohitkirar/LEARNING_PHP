<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('gift_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId("gift_card_product_id");
            $table->foreignId("user_id");
            $table->integer("purchase_amount");
            $table->integer("amount_left");
            $table->boolean("is_claimed")->default(false);
            $table->date("expires_at")->default(now()->addYear());
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gift_cards');
    }
};
