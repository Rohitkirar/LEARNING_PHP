<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('followers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid("user_id");
            $table->foreignUuid("follower_id")->constrained("users" , "id");
            $table->enum("type" , ["follower" , "following"]);
            $table->boolean("is_accepted")->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('followers');
    }
};
