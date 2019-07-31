<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $fillable = ['name','student_effectif', 'study_level_id', 'school_id'];

    public function study_level() {
    	return $this->belongsTo('App\Models\StudyLevel');
    }

    public function school() {
    	return $this->belongsTo('App\Models\School');
    }

    public function timetables() {
    	return $this->hasMany('App\Models\Timetable', 'class_id');
    }

    public function students() {
        return $this->belongsToMany('App\Models\Student', 'class_student')->withPivot('school_id', 'academic_year_id', 'studylevel_id', 'previous_school', 'academic_file')->withTimestamps();
    }
}
