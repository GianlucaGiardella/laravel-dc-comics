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
        Schema::create("comics", function (Blueprint $table) {
            $table->id();

            $table->string("title", 80);
            $table->text("description");
            $table->string("thumb", 30);
            $table->mediumInteger("price");
            $table->string("series", 30);
            $table->date("sale_date");
            $table->string("type", 30);
            $table->json("artists");
            $table->json("writers");

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
        Schema::dropIfExists('comics');
    }
};