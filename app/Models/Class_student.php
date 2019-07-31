<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Class_student extends Model
{
    protected $table = 'class_student';
    protected $fillable = ['school_id', 'academic_year_id', 'studylevel_id', 'previous_school', 'academic_file','student_id','classe_id'];

    public function study_level() {
        return $this->belongsTo('App\Models\StudyLevel');
    }

    public function school() {
        return $this->belongsTo('App\Models\School');
    }
    public function student() {
        return $this->belongsTo('App\Models\Student');
    }
    public function classe() {
        return $this->belongsTo('App\Models\Classe');
    }
}
