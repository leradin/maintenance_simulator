<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->char('enrollment',12)->unique();
            $table->string('password');
            $table->string('names',50);
            $table->string('lastnames',50);
            $table->integer('degree_id')->unsigned();
            $table->foreign('degree_id')->references('id')->on('degrees');
            $table->integer('ascription_id')->unsigned();
            $table->foreign('ascription_id')->references('id')->on('ascriptions');
            $table->boolean('user'); // if is user = 1 then student = 0
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
