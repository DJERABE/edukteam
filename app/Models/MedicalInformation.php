<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class MedicalInformation extends Model
{
      
    protected $fillable = [
        'bloodgroup_id',
        'emergency_clinic',
        'family_doctor',
        'family_doctor_tel',
        'medical_history',
        'allergies',
        'childhood_diseases',
        'student_id'
    ];

    public function bloodgroup() {
        return $this->belongsTo('App\Models\BloodGroup');
    }

    public function student() {
        return $this->belongsTo('App\Models\Student');
    }
}
