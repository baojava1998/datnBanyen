<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->Increments('detail_id');
            $table->integer('detail_price');
            $table->integer('detail_quantity');
            $table->unsignedInteger('detail_prod');
            $table->foreign('detail_prod')
                  ->references('prod_id')
                  ->on('products')
                  ->onDelete('cascade');
            $table->unsignedInteger('detail_order');
            $table->foreign('detail_order')
                  ->references('order_id')
                  ->on('orders')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('order_details');
    }
}
