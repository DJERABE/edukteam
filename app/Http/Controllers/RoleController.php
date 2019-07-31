<?php

namespace App\Http\Controllers;

use App\Traits\Authorizable;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Auth;

class RoleController extends Controller
{
    use Authorizable;

    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('roles.index', compact('roles', 'permissions'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'display_name' => 'required|min:2|max:191',
            'permissions' => [
                '*' => 'required'
            ]
        ]);

        $role = new Role;
        $role->name = str_slug($request->display_name);
        $role->display_name = $request->display_name;

        if($role->save())
        {
            $role->syncPermissions($request->permissions);
            flash('Rôle ajouté.');
        }

        return redirect()->route('roles.index');
    }

    public function show(Role $role) {
        $permissions = Permission::all();
        return view('roles.show', compact('role', 'permissions'));
    }
    
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'display_name' => 'required|min:2|max:191',
            'permissions' => [
                '*' => 'required'
            ]
        ]);

        if($role = Role::findOrFail($id))
        {
            if($role->name === 'admin')
            {
                $role->syncPermissions(Permission::all());
                return redirect()->route('roles.index');
            }
            else {
                $role->name = str_slug($request->display_name);
                $role->display_name = $request->display_name;
                $role->save();
    
                $role->syncPermissions($request->permissions);
    
                flash( $role->display_name . ' modifié.');
            }
        }
        else
        {
            flash()->error( 'Le rôle avec l\'identifiant '. $id .' n\'a pas été trouvé.');
        }
        
        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        if($role->name == 'admin')
        {
            flash()->warning('Vous ne pouvez pas supprimer le rôle Admin');
        }
        elseif($role->name == Auth::user()->roles->implode('name', ', '))
        {
            flash()->warning('La suppression de ce rôle avec un compte actuellement connecté n\'est pas autorisée :(');
        }
        else
        {
            if( Role::findOrFail($id)->delete() ) {
                flash()->success('Le rôle a été supprimé.');
            } else {
                flash()->error('Le rôle n\'a pas pu etre supprimé.');
            }
        }
        
        return redirect()->route('roles.index');
    }
}