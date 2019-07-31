<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\CategorieMatiere;
use App\Models\Role;
use App\Models\Matiere;
use App\Models\Permission;
use App\Traits\Authorizable;
use App\Models\School;
use Auth;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matieres = Matiere::all();
        return view('matieres.index', compact('matieres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::all();
        $categorie_matieres = CategorieMatiere::all();
        return view('matieres.create', compact('schools','categorie_matieres'));    //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'nom_matiere' => 'required|string| min:3|max:191',
            'categorie_classe_id' => 'required|integer',
            'categorie_matiere_id' => 'required|integer',
            'school' => 'required|integer',
            ]);
            // dd($request->all());
            
            $matiere = Matiere::create([
            'nom_matiere' => $request->nom_matiere,
            'categorie_matiere_id' => $request->categorie_matiere_id,
            'categorie_classe_id' => $request->categorie_classe_id,
            'school_id' => $request->school,
        ]);

        flash(' Matière enregistré avec succès.')->success();
        return redirect()->route('matieres.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Matiere $matiere)
    {
        $schools = School::all();
        $categorie_matieres = CategorieMatiere::all();
        return view('matieres.edit',compact('matiere','categorie_matieres','schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matiere $matiere)
    {
       $this->validate($request, [
        'nom_matiere' => 'required|string| min:3|max:191',
        'categorie_classe_id' => 'required|integer',
        'categorie_matiere_id' => 'required|integer',
        'school' => 'required|integer',
        ]);
        // dd($request->all());
        $matiere->update([
        'nom_matiere' => $request->nom_matiere,
        'categorie_classe_id' => $request->categorie_classe_id,
        'categorie_matiere_id' => $request->categorie_matiere_id,
        'school_id' => $request->school,
        ]);

        flash(' Matiere modifié avec succès.')->success();
        
        return redirect()->route('matieres.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}