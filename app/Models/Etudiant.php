<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
	
        protected $fillable = [
        'nom_classe' ,
        'classe_id' 
    ];

    
    public function classe(){

        return $this->belongsTo('App\Models\Classe');
    }
}
