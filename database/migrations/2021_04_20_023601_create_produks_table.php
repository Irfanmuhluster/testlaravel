<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('product_name','225');
            $table->string('product_description','225');
            $table->string('image1','225');
            $table->string('image2','225');
            $table->string('size');
            $table->string('color');
            $table->integer('harga_s');
            $table->integer('harga_m');
            $table->integer('harga_l');
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
        Schema::dropIfExists('produks');
    }
}
