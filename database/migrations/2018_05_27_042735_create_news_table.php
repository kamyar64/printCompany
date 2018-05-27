<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('news_group');
            $table->integer('news_priority');
            $table->integer('news_user_insert');
            $table->date('date_published');
            $table->date('date_expired');
            $table->boolean('is_archive');
            $table->boolean('is_expire');
            $table->string('picture');
            $table->string('title');
            $table->text('abstract');
            $table->text('body');
            $table->text('reference');
            $table->longText('key_words')->nullable();
            $table->integer('department');
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
        Schema::dropIfExists('news');
    }
}
