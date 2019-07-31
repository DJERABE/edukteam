<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
      
    protected $fillable = ['name', 'category_id', 'school_id'];
    
    public function category() {
    	return $this->belongsTo('App\Models\SubjectCategory');
    }
    
    public function school() {
    	return $this->belongsTo('App\Models\School');
    }

    public function professors() {
        return $this->belongsToMany('App\Models\Professor');
    }

    public function days() {
        return $this->belongsToMany('App\Models\Day')->withPivot('professor_id', 'start', 'end')->withTimestamps();
    }
}
