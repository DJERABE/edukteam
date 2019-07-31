<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    
            protected $fillable = [
            'unitaire',
            'montant',
            'remise',
            'attendu',
            'quantite',
            'obligatoire',
            'exclure',
            'frais_configs_id',
            'etudiant_id'
        ];
    
        public function fraisconfig()
    {
        return $this->belongsTo('App\Models\FraisConfig');
    }
        public function etudiant()
    {
        return $this->belongsTo('App\Models\Etudiant');
    }
 
}
