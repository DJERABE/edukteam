<?php

namespace App\Http\Controllers;
use App\Models\Facture;
use App\Models\School;
use App\Models\FraisConfig;
use App\Models\Etudiant;
use Auth;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::all(); 
        $factures = Facture::with('fraisconfig')->with('etudiant')->get(); 
        // $factures = Facture::all(); 
        // dd($factures);
        return view('factures.index',compact('factures','schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $schools = FraisConfig::all(); 
        $factures = FraisConfig::with('school')->with('echeance')->with('annee')->where('school_id',$request->school_id)->where('classe_id',$request->classe_id)->where('echeance_id',$request->echeance_id)->get();
        dd($factures);
        return view('factures.create', compact('factures'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        
        $montant =($request->quantite * $request->montant) - $request->remise; 
        // dd($montant);

            Facture::create([
                    'unitaire'=>$request->unitaire, 
                    'montant'=>$montant, 
                    'remise'=>$request->remise, 
                    'attendu'=>$request->attendu, 
                    'quantite'=>$request->quantite, 
                    // 'obligatoire'=>$request->obligatoire, 
                    // 'exclure'=>$request->exclure, 
                    'frais_configs_id'=>$request->frais_configs_id, 
                    'etudiant_id'=>$request->etudiant_id, 
            ]);

        $schools = School::all(); 
        $factures = Facture::with('fraisconfig')->with('etudiant')->get(); 
        return view('factures.index',compact('schools','factures'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facture  = Facture::findOrFail($id);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    public function factureetudiant(Request $request)
    { 
        // dd($request->classe_id);
    $etudiant =Etudiant::where('id', $request->etudiant_id)->first();
    $factures = FraisConfig::where('school_id',$request->school_id)->where('echeance_id',$request->echeance_id)->first();
    // with('school')->with('echeance')->with('annee')->where('school_id',$request->school_id)->where('classe_id',$request->classe_id)->where('echeance_id',$request->echeance_id)->first();
    // dd($factures);
    return view('factures.create', compact('factures','etudiant'));
       
    }
}
