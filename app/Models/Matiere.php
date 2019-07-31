<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
      
     protected $fillable = [
         'nom_matiere', 
         'school_id',
         'categorie_matiere_id',
         'categorie_classe_id',

        ];
    public function categorieMatiere()
    {
        return $this->belongsTo('App\Models\CategorieMatiere');
    }
    public function categorieClasse()
    {
        return $this->belongsTo('App\Models\CategorieClasse');
    }

    public function school()
    {
        return $this->belongsTo('App\Models\School');
    }


    public function professeurs() {
        return $this->belongsToMany(User::class, 'matiere_professeur', 'professeur_id','matiere_id');
    }



    
}