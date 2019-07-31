<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\User;
use App\Models\Role;
use App\Models\Ville;
use App\Models\Pays;
use Illuminate\Http\Request;
use App\Traits\Authorizable;
use Auth;

class SchoolController extends Controller
{
    use Authorizable;

    public function index()
    {
        if(Auth::user()->school_id != null) {
            $schools = School::where('id', Auth::user()->school_id)->get();
        }
        else {
            $schools = School::all();
        }
        return view('schools.index', compact('schools'));
    }

    public function create()
    {
        $villes = Ville::all();
        return view('schools.create', compact('villes'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required|string|max:191',
            'slogan' => 'nullable|string|max:191',
            'siteweb' => 'nullable|string|max:191',
            'contact_1' => 'required|min:11|max:12',
            'contact_2' => 'nullable|min:11|max:12',
            'email' => 'required|email|unique:schools',
            'adresse' => 'required|string|max:191',
            'ville' => 'required|integer',
            'nom_banque' => 'nullable|string|max:191',
            'nom_compte_banque' => 'nullable|string|max:191',
            'numero_compte_banque' => 'nullable|string|max:191',
            'nom_school_manager' => 'required|min:2',
            'prenoms_school_manager' => 'required|min:2',
            'contact_1_school_manager' => 'required|min:11|max:12',
            'contact_2_school_manager' => 'nullable|min:11|max:12',
            'email_school_manager' => 'required|email',
            'password_school_manager' => 'required|min:6|confirmed',
            'password_school_manager_confirmation' => 'required|min:6',
        ]);

        $school = School::create([
            'nom' => $request->nom,
            'slogan' => $request->slogan,
            'siteweb' => $request->siteweb,
            'contact_1' => $request->contact_1,
            'contact_2' => $request->contact_2,
            'email' => $request->email,
            'latitude' => null,
            'longitude' => null,
            'adresse' => $request->adresse,
            'ville_id' => $request->ville,
            'pays_id' => 1,
            'nom_banque' => $request->nom_banque,
            'nom_compte_banque' => $request->nom_compte_banque,
            'numero_compte_banque' => $request->numero_compte_banque,
            'logo' => null
        ]);

        if($school) {
            $school_manager = new User;
            $school_manager->nom = $request->nom_school_manager;
            $school_manager->prenoms = $request->prenoms_school_manager;
            $school_manager->contact_1 = $request->contact_1_school_manager;
            $school_manager->contact_2 = $request->contact_2_school_manager;
            $school_manager->email = $request->email_school_manager;
            $school_manager->password = bcrypt($request->password_school_manager);
            $school_manager->revoked = 1;
            $school_manager->school_id = $school->id;
            if ($school_manager->save()) { 
                $roles = Role::find(3);
                if(!$school_manager->hasAllRoles($roles)) {
                    $school_manager->permissions()->sync([]);
                }
                else
                {
                    $school_manager->syncPermissions($permissions);
                } 
                $school_manager->syncRoles($roles);
                flash('Établissement enregistré avec succès.')->success(); 
                return redirect()->route('schools.index');
            }
        }
    }

    public function show(School $school)
    {
        return view('schools.show', compact('school'));
    }

    public function edit(School $school)
    {
        $villes = Ville::all();
        return view('schools.edit', compact('school', 'villes'));
    }

    public function update(Request $request, School $school)
    {
        $this->validate($request, [
            'nom' => 'required|string|max:191',
            'slogan' => 'required|string|max:191',
            'siteweb' => 'required|string|max:191',
            'contact_1' => 'required|min:11|max:12',
            'contact_2' => 'nullable|min:11|max:12',
            'email' => 'required|email|unique:schools,email,'.$school->id,
            'adresse' => 'required|string|max:191',
            'ville' => 'required|integer',
            'nom_banque' => 'required|string|max:191',
            'nom_compte_banque' => 'required|string|max:191',
            'numero_compte_banque' => 'required|string|max:191'
        ]);

        $school->update([
            'nom' => $request->nom,
            'slogan' => $request->slogan,
            'siteweb' => $request->siteweb,
            'contact_1' => $request->contact_1,
            'contact_2' => $request->contact_2,
            'email' => $request->email,
            'adresse' => $request->adresse,
            'ville_id' => $request->ville,
            'nom_banque' => $request->nom_banque,
            'nom_compte_banque' => $request->nom_compte_banque,
            'numero_compte_banque' => $request->numero_compte_banque
        ]);

        flash('Établissement modifié avec succès.')->success();
        
        return redirect()->route('schools.index');
    }

    public function destroy(School $school)
    {
        //
    }
}
