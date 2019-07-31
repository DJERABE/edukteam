<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    
    use HasRoles, Notifiable;

    protected $guard_name = 'web';

    protected $fillable = [
        'nom', 'prenoms', 'contact_1', 'contact_2', 'email', 'password', 'revoked', 'school_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function school() {
        return $this->belongsTo('App\Models\School', 'school_id');
    }
}
