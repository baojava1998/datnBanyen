<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements('rating_id');
            $table->integer('rating_star');
            $table->unsignedInteger('rating_prod');
            $table->foreign('rating_prod')
                  ->references('prod_id')
                  ->on('products')
                  ->onDelete('cascade');
            $table->unsignedInteger('rating_user');
            $table->foreign('rating_user')
                  ->references('id')
                  ->on('users')
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
        Schema::dropIfExists('ratings');
    }
}
