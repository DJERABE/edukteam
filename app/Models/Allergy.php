<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
	
    protected $fillable = ['name', 'name_fr', 'name_en', 'school_id'];

    public function school() {
    	return $this->belongsTo('App\Models\School');
    }

    public function medical_informations() {
        return $this->belongsToMany('App\Models\MedicalInformation', 'medical_history_information');
    }
}
