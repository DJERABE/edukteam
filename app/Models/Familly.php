<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Familly extends Model
{
	
    protected $fillable = ['name','code_family','school_id'];

    public function contacts(){
        return $this->hasMany('App\Models\Contact');
    }

    public function students(){
        return $this->hasMany('App\Models\Student');
    }

    public function school() {
        return $this->belongsTo('App\Models\School');
    }
}
