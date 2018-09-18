<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOccupationMedicalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occupation_medical', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('occupation_id')->unsigned();
            $table->integer('medical_id')->unsigned();

            $table->foreign('occupation_id')->references('id')->on('occupations');
            $table->foreign('medical_id')->references('id')->on('medicals');
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
        Schema::dropIfExists('occupation_medical');
    }
}
