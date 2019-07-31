<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Traits\Authorizable;
use Auth;

class UserController extends Controller
{
    use Authorizable;

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required|min:2',
            'prenoms' => 'required|min:2',
            'contact_1' => 'required|min:11|max:12',
            'contact_2' => 'nullable|min:11|max:12',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'roles' => 'required|min:1'
        ]);

        $user = new User;
        $user->nom = $request->nom;
        $user->prenoms = $request->prenoms;
        $user->contact_1 = $request->contact_1;
        $user->contact_2 = $request->contact_2;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->revoked = 1;
        if ($user->save())
        {
            $this->syncPermissions($request, $user);
            flash('Le compte a été créé.')->success();
        } 
        else 
        {
            flash()->error('Impossible de créer ce compte.');
        }

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $permissions = Permission::all('name', 'id');

        return view('users.edit', compact('user', 'roles', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom' => 'required|min:2',
            'prenoms' => 'required|min:2',
            'contact_1' => 'required|min:11|max:12',
            'contact_2' => 'nullable|min:11|max:12',
            'email' => 'required|email|unique:users,email,'.$id,
            'roles' => 'required|min:1'
        ]);

        $user = User::findOrFail($id);

        $user->nom = $request->nom;
        $user->prenoms = $request->prenoms;
        $user->contact_1 = $request->contact_1;
        $user->contact_2 = $request->contact_2;
        $user->email = $request->email;
        $user->revoked = 1;

        $user->fill($request->except('roles', 'permissions'));

        $this->syncPermissions($request, $user);

        $user->save();

        flash()->success('Le compte a été modifié.');

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        /*if ( Auth::user()->id == $id )
        {
            flash()->warning('La suppression de cet compte actuellement connecté n\'est pas autorisée :(')->important();
            return redirect()->route('users.index');
        }

        $user = User::findOrFail($id);
        if($user->revoked == 0) {
            $user->revoked = 1;
            $user->save();
            
            flash()->success('Compte désactivé !');
            return redirect()->route('users.index');
        }
        elseif($user->revoked == 1) {
            $user->revoked = 0;
            $user->save();

            flash()->success('Compte réactivé !');
            return redirect()->route('users.index');
        }

        return redirect()->back();*/
    }

    private function syncPermissions(Request $request, $user)
    {
        $roles = $request->get('roles', []);

        $permissions = $request->get('permissions', []);
        
        $roles = Role::find($roles);

        if(!$user->hasAllRoles($roles))
        {
            $user->permissions()->sync([]);
        }
        else
        {
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);

        return $user;
    }

    public function showProfil() {
        return view('auth.profil');
    }

    public function profilUpdate(Request $request ,$id){

          
        $this->validate($request,[
            'nom'=>'required',
            'prenoms' =>'required',
            'contact_1' =>'required'
        ]);

        $user = User::update([
             'nom' => $request->nom,
             'prenoms' =>$request->prenoms,
             'contact_1' =>$request->contact_1
        ]);

        return redirect()->back();
    }

    public function updateProfil(Request $request) {
        dd($request->all()); 
        $this->validate($request,[
            'nom'=>'required',
            'prenoms' =>'required',
            'contact_1' =>'required'
        ]);

        $user = User::findOrfail(Auth::user()->id);
        $user->update([
             'nom' => $request->nom,
             'prenoms' =>$request->prenoms,
             'contact_1' =>$request->contact_1
        ]); 
            flash('Profil modifie avec success')->success();
        return redirect()->back();
    }
    
    public function formulaire(Request $request) {
        $data = "salut la famille";
        return $data;
    }

    // public function updatepassword(Request $request) {
        public function updatepassword(Request $request, $id){ 
        
        $this->validate($request, [
            
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6', 
            ]);
            $user = User::findOrFail($id);
            // dd($user); 
             
                $user->update([
                // 'email'=> $request->email,
                'password'=> bcrypt($request->password) 
              ]);

            flash('Profil modifie avec success')->success();
        return redirect()->back(); 
    }
}
