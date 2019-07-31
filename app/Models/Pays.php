<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
	  
    protected $fillable = ['nom', 'code_iso', 'indicatif'];
    protected $table = "pays";

    public function villes()
    {
        return $this->hasMany('App\Ville');
    }
}