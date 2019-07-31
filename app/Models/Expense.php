<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{	
	
    protected $fillable = ['name','school_id'];

    protected $dates = ['delete_at'];

    public function school() {
    	return $this->belongsTo('App\Models\School');
    }
    
    public function fraisconfigs() {
    	return $this->hasMany('App\Models\FraisConfig');
    }
}
