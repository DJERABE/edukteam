<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    
    protected $fillable = [
        'guardian_type_id',
        'family_id',
        'last_name',
        'career',
        'given_names',
        'is_contact',
        'tel_home',
        'cell',
        'email',
        'address',
        'school_id'
    ];

    // public function students() {
    //     return $this->belongsToMany('App\Models\Student', 'contact_student')->withTimestamps();
    // }

    public function family(){
        return $this->belongsTo('App\Models\Familly','family_id');
    }

    public function guardian_type(){
        return $this->belongsTo('App\Models\GuardianType');
    }

 
}
