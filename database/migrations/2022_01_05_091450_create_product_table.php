<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_category');
            $table->unsignedBigInteger('id_discount');
            $table->unsignedBigInteger('id_shop');
            $table->text('name');
            $table->float('price');
            $table->text('description');
            $table->text("image");
            $table->text("thumbnail");
            $table->float("rate");
            $table->integer("amount");
            $table->integer("bought_amount")->default(0);
            $table->timestamps();
            $table->foreign('id_category')->references('id')->on('categories');
            $table->foreign('id_discount')->references('id')->on('discounts');
            $table->foreign('id_shop')->references('id')->on('shops');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
