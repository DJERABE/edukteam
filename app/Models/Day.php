<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = ['name'];

    public function timetables() {
        return $this->belongsToMany('App\Models\Timetable');
    }

    public function subjects() {
        return $this->belongsToMany('App\Models\Subject')->withPivot('professor_id', 'start', 'end')->withTimestamps();;
    }
}
