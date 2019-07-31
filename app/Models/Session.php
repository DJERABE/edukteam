<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
	  
    protected $fillable = ['name', 'start', 'end','academic_year_id', 'school_id'];

    public function academic_year() {
    	return $this->belongsTo('App\Models\AcademicYear');
    }

    public function school() {
    	return $this->belongsTo('App\Models\School');
    }
}
