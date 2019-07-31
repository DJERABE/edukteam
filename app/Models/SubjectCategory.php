<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectCategory extends Model
{
	  
    protected $fillable = ['name', 'school_id'];

    protected $table = "subject_categories";
    
    public function school() {
    	return $this->belongsTo('App\Models\School');
    }
}
