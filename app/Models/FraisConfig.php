<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FraisConfig extends Model
{
    
    protected $fillable =
    [
    	'school_id',
		'annee_id',
		'frais_id',
		'classe_id',
		'echeance_id',
		'montant',
        'frais_obligatoire'
    ];

     public function school() {
        return $this->belongsTo('App\Models\School');
    }

    public function frais() {
        return $this->belongsTo('App\Models\Frais');
    }
    public function echeance() {
        return $this->belongsTo('App\Models\Echeance');
    }
    public function classe() {
        return $this->belongsTo('App\Models\Classe');
    }

    public function annee() {
        return $this->belongsTo('App\Models\Annee');
    }
    public function factures()
    {
        return $this->hasMany('App\Models\Facture');
    } 
}
