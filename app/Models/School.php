<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class School extends Model
{
      
    protected $fillable = [
        'nom',
        'slogan',
        'siteweb',
        'contact_1',
        'contact_2',
        'email',
        'latitude',
        'longitude',
        'adresse',
        'ville_id',
        'pays_id',
        'nom_banque',
        'nom_compte_banque',
        'numero_compte_banque',
        'logo',
        'revoked'
    ];

    public function users() {
        return $this->hasMany('App\Models\User');
    }

    public function ville() {
        return $this->belongsTo('App\Models\Ville');
    }

    public function pays() {
        return $this->belongsTo('App\Models\Pays');
    }

    public function academic_years() {
        return $this->hasMany('App\Models\AcademicYear');
    }
    
    public function study_levels() {
        return $this->hasMany('App\Models\StudyLevel');
    }

    public function classes() {
        return $this->hasMany('App\Models\Classe');
    }

    public function subjects() {
        return $this->hasMany('App\Models\Subject');
    }

    public function professors() {
        return $this->hasMany('App\Models\Professor');
    }

    public function expenses() {
        return $this->hasMany('App\Models\Expense');
    }

    public function expense_configurations() {
        return $this->hasMany('App\Models\ExpenseConfiguration');
    }

    public function students(){
        return $this->hasMany('App\Models\Student');
    }
    public function famillys(){
        return $this->hasMany('App\Models\Familly');
    }
}
