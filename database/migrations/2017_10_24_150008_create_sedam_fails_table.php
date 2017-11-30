<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSedamFailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sedam_fails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('description',100)->nullable();
            $table->char('file_name',100)->nullable();
            $table->char('module_name',100)->nullable();
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
        Schema::dropIfExists('sedam_fails');
    }
}
