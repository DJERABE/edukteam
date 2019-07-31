<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    protected $table = "villes";
    protected $fillable = ['nom', 'pays_id'];

    public function pays()
    {
        return $this->belongsTo('App\Pays');
    }
}