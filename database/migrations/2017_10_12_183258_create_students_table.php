<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->char('enrollment',12)->unique();
            $table->string('names',50);
            $table->string('lastnames',50);
            $table->integer('degree_id')->unsigned();
            $table->foreign('degree_id')->references('id')->on('degrees');
            $table->integer('ascription_id')->unsigned();
            $table->foreign('ascription_id')->references('id')->on('ascriptions');
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
        Schema::dropIfExists('students');
    }
}
