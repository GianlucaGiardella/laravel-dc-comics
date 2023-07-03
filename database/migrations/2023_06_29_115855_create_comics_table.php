<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("comics", function (Blueprint $table) {
            $table->id();

            $table->string("title", 100);
            $table->text("description");
            $table->string("thumb", 400);
            $table->mediumInteger("price");
            $table->string("series", 100);
            $table->date("sale_date");
            $table->string("type", 80);
            $table->json("artists");
            $table->json("writers");

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comics');
    }
};