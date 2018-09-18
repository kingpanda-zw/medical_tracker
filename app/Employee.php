<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = [
   		'first_name',
   		'last_name',
      'medical_status',
   		'occupation_id',
   		'occupation_type',
   	];

   	public function occupation(){
        return $this->belongsTo('App\Occupation');
    }

    public function medicals(){
      return $this->belongsToMany('App\Medical');
    }

    public function occupations(){
        return $this->belongsToMany('App\Employee');
    }
   	
    public function medical_occupations(){
        return $this->belongsToMany('App\MedicalOccupation');
    }
}
