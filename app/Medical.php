<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    //
    protected $fillable = [
    	'name',
    ];

    //many to many relationship
    public function occupations(){
    	return $this->belongsToMany('App\Occupation');
    }

    public function employees(){
    	return $this->belongsToMany('App\Employee');
    }
}
