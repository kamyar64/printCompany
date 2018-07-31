<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('family');
            $table->string('mobile');
            $table->string('tell');
            $table->string('zip_code');
            $table->text('address');
            $table->string('lat_google')->default('');
            $table->string('email');
            $table->string('long_google')->default('');
            $table->integer('user_id')->unsigned();
            $table->boolean('default')->default(false);
            $table->boolean('isDelete')->default(false);
            $table->timestamps();
        });
        Schema::table('users_addresses', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_addresses');
    }
}
