<?php

namespace App\Models;
use Spatie\Permission\Models\Permission as PermissionSpatie;

class Permission extends PermissionSpatie
{
    
    public static function defaultPermissions()
    {
        return [
            'view_users',
            'add_users',
            'edit_users',
            'delete_users',

            'view_roles',
            'add_roles',
            'edit_roles',
            'delete_roles',

            'view_schools',
            'add_schools',
            'edit_schools',
            'delete_schools',

            'view_annees',
            'add_annees',
            'edit_annees',
            'delete_annees',

            'delete_contacts',
            'add_contacts',
            'edit_contacts',
            'delete_contacts',

            'view_families',
            'add_families',
            'edit_families',
            'delete_families',

            
        ];
    }
}