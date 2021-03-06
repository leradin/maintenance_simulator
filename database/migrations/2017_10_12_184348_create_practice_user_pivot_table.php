<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracticeUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practice_user_pivot', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practices');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('evaluator_user_id')->unsigned()->nullable();
            $table->foreign('evaluator_user_id')->references('id')->on('users');
            $table->integer('exercise_id')->unsigned();
            $table->text('answer')->nullable();
            $table->boolean('passed')->nullable();
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
        Schema::dropIfExists('practice_user_pivot');
    }
}
