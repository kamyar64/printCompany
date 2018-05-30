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
            $table->integer('news_group')->unsigned();
            $table->integer('news_priority')->unsigned();
            $table->integer('news_user_insert')->unsigned();
            $table->integer('department')->unsigned();
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
            $table->timestamps();
        });

        Schema::table('news', function($table) {
            $table->foreign('news_group')->references('id')->on('news_groups')->onDelete('cascade');
            $table->foreign('news_priority')->references('id')->on('priorities')->onDelete('cascade');
            $table->foreign('news_user_insert')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('department')->references('id')->on('departments')->onDelete('cascade');
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
