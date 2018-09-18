<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalOccupation extends Model
{
    //
    protected $table = "medical_occupation";

    protected $fillable = [
   		'medical_id',
   		'occupation_id',
   	];

   	public function employees(){
        return $this->belongsToMany('App\Employee');
    }
}
