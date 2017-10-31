<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracticeSoftwareBehaviorPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practice_software_behavior_pivot', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('software_behavior_id')->unsigned();
            $table->foreign('software_behavior_id')->references('id')->on('software_behaviors');
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
        Schema::dropIfExists('practice_software_behavior_pivot');
    }
}
