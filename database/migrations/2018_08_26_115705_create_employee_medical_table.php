<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeMedicalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_medical', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->integer('medical_id')->unsigned();
            $table->date('last_exam')->nullable();
            $table->date('due_exam')->nullable();
            $table->string('status')->nullable();

            $table->foreign('employee_id')->references('id')->on('employess');
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
        Schema::dropIfExists('employee_medical');
    }
}
