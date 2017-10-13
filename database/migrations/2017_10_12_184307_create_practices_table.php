<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->dateTime('date_time');
            $table->time('duration');
            $table->integer('error_type_id')->unsigned();
            $table->foreign('error_type_id')->references('id')->on('error_types');
            $table->integer('unit_type_id')->unsigned();
            $table->foreign('unit_type_id')->references('id')->on('unit_types');
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
        Schema::dropIfExists('practices');
    }
}
