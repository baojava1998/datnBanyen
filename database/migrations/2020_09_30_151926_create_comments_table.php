<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->Increments('cmt_id');
            $table->string('cmt_content');
            $table->unsignedInteger('cmt_prod');
            $table->foreign('cmt_prod')
                  ->references('prod_id')
                  ->on('products')
                  ->onDelete('cascade');
            $table->unsignedInteger('cmt_user');
            $table->foreign('cmt_user')
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
        Schema::dropIfExists('comments');
    }
}
