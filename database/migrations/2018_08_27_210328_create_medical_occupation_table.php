<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalOccupationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_occupation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medical_id')->unsigned();
            $table->integer('occupation_id')->unsigned();

            $table->foreign('medical_id')->references('id')->on('medicals');
            $table->foreign('occupation_id')->references('id')->on('occupations');
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
        Schema::dropIfExists('medical_occupation');
    }
}
