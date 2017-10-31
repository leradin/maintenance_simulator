<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracticeHardwareBehaviorPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practice_hardware_behavior_pivot', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hardware_behavior_id')->unsigned();
            $table->foreign('hardware_behavior_id')->references('id')->on('hardware_behaviors');
            $table->integer('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('practice_hardware_behavior_pivot');
    }
}
