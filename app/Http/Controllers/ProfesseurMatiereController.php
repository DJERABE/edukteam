<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annee;
use App\Models\School;
use App\Models\User;
use App\Models\Matiere;
use App\Models\CategorieMatiere;
use App\Models\ProfesseurMatiere;
use App\Models\Permission;
use App\Traits\Authorizable;
use Auth;

class ProfesseurMatiereController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $schools = School::all();
        $annees  = Annee::all();
        $users = User::role('Professeur')->get();
        //$matieres_professeurs = ProfesseurMatiere::all();
        return view('professeurs_matieres.index',compact('schools','annees','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $schools = School::all();
         $matieres = Matiere::all();
         $categorie_matieres = CategorieMatiere::all();

         $users = User::role('Professeur')->get();
         //$roles = Role::all();
         //dd($users);
        return view('professeurs_matieres.create',compact('schools','matieres','matieres_profs','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $this->validate($request, [
            'matiere_id' => 'required',
            'professeur_id'=>'required',
            'school_id' => 'required',
            //'professeur_id'=>'required'
        ]);


            $professeur = User::findOrFail($request->professeur_id);

            $matiere = Matiere::findOrFail($request->matiere_id);

            $professeur->matieres()->attach($matiere->id);
              
        flash('success')->success();

        return redirect()->route('professeursMatieres.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfesseurMatiere $professeurMatiere)
    {
         $schools = School::all();
         $matieres = Matiere::all();
         $categorie_matieres = CategorieMatiere::all();

         $users = User::role('Professeur')->get();
         //$roles = Role::all();
         //dd($users);
        return view('professeurs_matieres.edit',compact('schools','matieres','categorie_matieres','users','professeurMatiere'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfesseurMatiere $professeurMatiere)
    {
            $this->validate($request, [
            'annee_id' => 'required|string',
            'matiere_id' => 'required',
            'school_id' => 'required',
            'professeur_id'=>'required'
            ]);
        $professeurMatiere->update([
            'annee_id' => $request->annee_id,
            'matiere_id' => $request->matiere_id,
            'school_id' => $request->school_id,
            'professeur_id'=>$request->professeur_id 
        ]);

        flash('Allocation de matiere modifiée avec succès.')->success();
        
        return redirect()->route('professeursMatieres.index');
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


         public function searchs(Request $request) {

            
               $this->validate($request,
                        [
                            'school_id'=>'required',
                            'annee_id'=>'required',
                            'professeur_id'=>'required'
                        ]);

        $annees = Annee::all();
        $schools = School::all();
        $professeurs = User::role('Professeur')->get() ;    

        $constraints = [
            'school_id' => $request->school_id,
            'annee_id' => $request->annee_id,
            'professeur_id' => $request->professeur_id
            ];

          $matieres_profs = $this->doSearchingQuery($constraints);



         return view('professeurs_matieres.index', ['professeurs' => $professeurs, 'searchingVals' => $constraints,'schools'=>$schools,'annees'=>$annees,'matieres_profs'=>$matieres_profs]);
    }

    private function doSearchingQuery($constraints) {
        

        $fields = array_keys($constraints);
        //dd($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = User::findOrFail($constraint)->matieres;
                
            }
            $index++;
        }

        //dd($query);
        return $query;
    }
}
