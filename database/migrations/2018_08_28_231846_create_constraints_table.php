<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstraintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Schema::table('users', function (Blueprint $table) {

        //     $table->integer('role_id')->unsigned()->change();
        //     $table->foreign('role_id')->references('id')->on('roles');

        // });

        // Schema::table('employees', function(Blueprint $table) {

        //     $table->integer('occupation_id')->unsigned()->change();
        //     $table->foreign('occupation_id')->references('id')->on('occupations');
        // });

        // Schema::table('employee_medicals', function(Blueprint $table) {

        //     $table->integer('employee_id')->unsigned()->change();
        //     $table->integer('medical_id')->unsigned()->change();
        //     $table->foreign('employee_id')->references('id')->on('employess');
        //     $table->foreign('medical_id')->references('id')->on('medicals');
        // });

        // Schema::table('medical_occupation', function(Blueprint $table) {

        //     $table->integer('medical_id')->unsigned()->change();
        //     $table->integer('occupation_id')->unsigned()->change();
        //     $table->foreign('medical_id')->references('id')->on('medicals');
        //     $table->foreign('occupation_id')->references('id')->on('occupations');
        // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('constraints');
    }
}
