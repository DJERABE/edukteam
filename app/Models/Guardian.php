<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    
    protected $fillable = [
        'guardian_type_id',
        'last_name',
        'given_names',
        'career',
        'employer',
        'mailing_address',
        'tel_work',
        'tel_home',
        'cell',
        'email',
        'address'
    ];

    public function students() {
        return $this->belongsToMany('App\Models\Student', 'guardian_student')->withTimestamps();
    }

    public function guardian_type() {
        return $this->belongsTo('App\Models\GuardianType');
    }
}
