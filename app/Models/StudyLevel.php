<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyLevel extends Model
{
      
    protected $fillable = ['name', 'school_id'];

    protected $table = 'study_levels';

    public function school() {
    	return $this->belongsTo('App\Models\School');
    }

    public function classes() {
    	return $this->hasMany('App\Models\Classe');
    }

    public function expense_configurations() {
    	return $this->hasMany('App\Models\ExpenseConfiguration', 'studylevel_id');
    }
}
