<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CategorieMatiere extends Model
{
    
        protected $fillable = [
            'nom_categorie_matiere', 
            'school_id',
            'ordre_categorie_id'
        ];

        public function school()
        {
            return $this->belongsTo('App\Models\School');
        }
        public function ordreCategorie()
        {
            return $this->belongsTo('App\Models\OrdreCategoriee');
        }
        public function matieres()
        {
            return $this->hasMany('App\Models\Matiere');
        }
}