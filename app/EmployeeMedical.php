<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeMedical extends Model
{
    //
    protected $table = "employee_medical";

    protected $fillable = [
   		'employee_id',
   		'medical_id',
   		'last_exam',
   		'due_exam',
   		'status',
   	];
}
