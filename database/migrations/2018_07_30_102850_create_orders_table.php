<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('user_address')->unsigned();
            $table->string('count_order');
            $table->string('order_number');
            $table->boolean('isRead')->default(false);
            $table->integer('isDelete')->default(false);
            $table->timestamps();
        });
        Schema::table('orders', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_address')->references('id')->on('users_addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
