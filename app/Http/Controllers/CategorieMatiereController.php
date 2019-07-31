<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\CategorieMatiere;
use App\Models\Role;
use App\Models\Permission;
use App\Traits\Authorizable;
use App\Models\School;
use Auth;
use Illuminate\Http\Request;

class CategorieMatiereController extends Controller
{
    // use Authorizable;
    
    
    public function index()
    {
        $categorie_matieres = CategorieMatiere::all();
        return view('categorieMatieres.index', compact('categorie_matieres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::all();
        return view('categorieMatieres.create', compact('schools'));
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
            'nom_categorie_matiere' => 'required|string| min:3|max:191',
            'ordre' => 'required|integer',
            'school' => 'required|integer',
            ]);
            // dd($request->all());
            
            $categorie_matiere = CategorieMatiere::create([
            'nom_categorie_matiere' => $request->nom_categorie_matiere,
            'ordre_categorie_id' => $request->ordre,
            'school_id' => $request->school,
        ]);

        flash('Categorie Matière enregistré avec succès.')->success();
        return redirect()->route('categorieMatieres.index');

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
    public function edit(CategorieMatiere $categorieMatiere)
    {
        // dd($categorieMatiere);
        $schools = School::all();
        return view('categorieMatieres.edit', compact('schools', 'categorieMatiere'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategorieMatiere $categorieMatiere)
    {
        $this->validate($request, [
        'nom_categorie_matiere' => 'required|string| min:3|max:191',
        'ordre' => 'required|integer',
        'school' => 'required|integer',
        ]);
        $categorieMatiere->update([
        'nom_categorie_matiere' => $request->nom_categorie_matiere,
        'ordre_categorie_id' => $request->ordre,
        'school_id' => $request->school,
        ]);

        flash('Categorie Matiere modifié avec succès.')->success();
        
        return redirect()->route('categorieMatieres.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}