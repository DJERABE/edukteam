<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    protected $fillable = [
		'name',
		'start',
		'end',
		'school_id',
		'is_active'
    ];

    public function school() {
    	return $this->belongsTo('App\Models\School');
	}
	
    public function sessions() {
    	return $this->hasMany('App\Models\Session');
    }
}



