<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    //
    protected $fillable = [
    	'name',
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function medicals(){
    	return $this->belongsToMany('App\Medical');
    }

    public function employees(){
        return $this->belongsToMany('App\Employee');
    }
}
