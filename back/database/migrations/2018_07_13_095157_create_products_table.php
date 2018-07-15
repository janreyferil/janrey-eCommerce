<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku');
            $table->string('name');
            $table->text('description');
            $table->integer('product_status_id')->unsigned()->index();
            $table->foreign('product_status_id')->references('id')->on('product_statuses');
            $table->double('regular_price')->default(0);
            $table->double('discount_price')->default(0);
            $table->integer('quantity')->default(0);
            $table->boolean('taxable')->default(false);
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
        Schema::dropIfExists('products');
    }
}
