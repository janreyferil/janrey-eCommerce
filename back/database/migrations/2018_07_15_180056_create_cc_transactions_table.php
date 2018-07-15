<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCcTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cc_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->integer('order_id')->unsigned()->index();
            $table->foreign('order_id')->references('id')->on('sales_orders');
            $table->timestamp('transdate')->nullable();
            $table->string('processor');
            $table->string('processor_trans_id');
            $table->double('amount');
            $table->string('cc_num')->nullable();
            $table->string('cc_type')->nullble();
            $table->text('response')->nullable();
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
        Schema::dropIfExists('cc_transactions');
    }
}
