<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuardianType extends Model
{
	
    protected $fillable = ['name', 'display_name'];

    public function guardians() {
        return $this->hasMany('App\Models\Guardian');
    }
}
