<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;
class Frais extends Model
{

	use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['frais_configurations'];
	
    protected $fillable = ['nom','school_id'];

    protected $dates = ['delete_at'];




    public function school(){

    	return $this->belongsTo('App\Models\School');
    }


        public function fraisconfigs(){

    	return $this->hasMany('App\Models\FraisConfig');
    }
}
