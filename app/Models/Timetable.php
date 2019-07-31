<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    
    protected $fillable = [
        'name',
        'class_id',
        'school_id',
        'academic_year_id',
        'session_id'
    ];

    public function class() {
        return $this->belongsTo('App\Models\Classe');
    }

    public function school() {
        return $this->belongsTo('App\Models\School');
    }

    public function academic_year() {
        return $this->belongsTo('App\Models\AcademicYear');
    }

    public function session() {
        return $this->belongsTo('App\Models\Session');
    }

    public function days() {
        return $this->belongsToMany('App\Models\Day');
    }
}
