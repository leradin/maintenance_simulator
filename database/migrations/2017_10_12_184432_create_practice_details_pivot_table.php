<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracticeDetailsPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practice_details_pivot', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('material_id')->unsigned();
            $table->foreign('material_id')->references('id')->on('materials');
            $table->integer('tool_id')->unsigned();
            $table->foreign('tool_id')->references('id')->on('tools');
            /*$table->integer('instrument_id')->unsigned();
            $table->foreign('instrument_id')->references('id')->on('instruments');
            $table->integer('knowledge_id')->unsigned();
            $table->foreign('knowledge_id')->references('id')->on('knowledge');
            $table->integer('objective_id')->unsigned();
            $table->foreign('objective_id')->references('id')->on('objectives');
            $table->integer('software_behavior_id')->unsigned();
            $table->foreign('software_behavior_id')->references('id')->on('software_behaviors');
            $table->integer('hardware_behavior_id')->unsigned();
            $table->foreign('hardware_behavior_id')->references('id')->on('hardware_behaviors');
            $table->integer('activitie_id')->unsigned();
            $table->foreign('activitie_id')->references('id')->on('activities');*/
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
        Schema::dropIfExists('practice_details_pivot');
    }
}
