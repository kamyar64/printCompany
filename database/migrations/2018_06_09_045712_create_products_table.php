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
            $table->string('title');
            $table->integer('product_categories')->unsigned();
            $table->integer('product_statuses')->unsigned();
            $table->integer('product_authors')->unsigned();
            $table->integer('product_translators')->unsigned();
            $table->integer('product_sizes')->unsigned();
            $table->integer('product_volume_types')->unsigned();
            $table->integer('product_publishers')->unsigned();
            $table->integer('product_languages')->unsigned();
            $table->integer('pages_num');
            $table->date('release_date');
            $table->string('print_round');
            $table->string('ISBN');
            $table->string('dimension_length');
            $table->string('dimension_width');
            $table->string('dimension_height');
            $table->integer('product_measurement_units')->unsigned();
            $table->string('weight');
            $table->integer('product_weight_units')->unsigned();
            $table->string('price');
            $table->integer('product_cost_units')->unsigned();
            $table->string('picture');
            $table->text('body');
            $table->integer('product_user_insert')->unsigned();
            $table->integer('isDelete')->default(0);
            $table->timestamps();
        });
        Schema::table('products', function($table) {
            $table->foreign('product_categories')->references('id')->on('product_categories');
            $table->foreign('product_statuses')->references('id')->on('product_statuses');
            $table->foreign('product_authors')->references('id')->on('product_authors');
            $table->foreign('product_translators')->references('id')->on('product_translators');
            $table->foreign('product_sizes')->references('id')->on('product_sizes');
            $table->foreign('product_volume_types')->references('id')->on('product_volume_types');
            $table->foreign('product_publishers')->references('id')->on('product_publishers');
            $table->foreign('product_languages')->references('id')->on('product_languages');
            $table->foreign('product_measurement_units')->references('id')->on('product_measurement_units');
            $table->foreign('product_weight_units')->references('id')->on('product_weight_units');
            $table->foreign('product_cost_units')->references('id')->on('product_cost_units');
            $table->foreign('product_user_insert')->references('id')->on('users');

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
