<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->Increments('art_id');
            $table->string('art_title');
            $table->string('art_image')->nullable();
            $table->string('art_slug')->unique();
            $table->text('art_description');
            $table->longText('art_content');
            $table->unsignedInteger('art_cate');
            $table->foreign('art_cate')
                  ->references('cate_id')
                  ->on('articles_cate')
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
        Schema::dropIfExists('articles');
    }
}
