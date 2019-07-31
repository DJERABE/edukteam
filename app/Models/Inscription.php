<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    
    protected $fillable = ['school_id', 'academic_year_id', 'student_id', 'level_study_id', 'class_id', 'previous_school', 'academic_file'];

    public function school() {
    	return $this->belongsTo('App\Models\School');
    }
    
    public function academic_year() {
    	return $this->belongsTo('App\Models\AcademicYear');
    }
    
    public function student() {
    	return $this->belongsTo('App\Models\Student');
    }
    
    public function level_study() {
    	return $this->belongsTo('App\Models\LevelStudy');
    }

    public function class() {
    	return $this->belongsTo('App\Models\Classe', 'class_id');
    }
}
