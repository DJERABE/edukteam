<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class BloodGroup extends Model
{
	
    protected $fillable = ['name'];

    public function students() {
        return $this->hasMany('App\Models\Student');
    }
}
