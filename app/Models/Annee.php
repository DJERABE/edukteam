<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annee extends Model
{
    //

    protected $fillable = [
		'session_name',
		'session_period',
		'session_startdate',
		'session_enddate',
		'school_id',
		'is_active',
    ];

    public function school(){
    	return $this->belongsTo('App\Models\School');
    }
       public function fraisconfigs(){
    	return $this->belongsTo('App\Models\FraisConfig');
    }
}



