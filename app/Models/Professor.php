<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
	  
    protected $fillable = [
        'nom', 'prenoms', 'contact_1', 'contact_2', 'email', 'school_id','professor_files'
    ];

    public function school() {
        return $this->belongsTo('App\Models\School');
    }

    public function subjects() {
        return $this->belongsToMany('App\Models\Subject');
    }
}
