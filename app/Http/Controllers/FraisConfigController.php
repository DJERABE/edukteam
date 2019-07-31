<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\FraisConfig;
use App\Models\School;


class FraisConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $frais_configurations = FraisConfig::all();
        $schools = School::all();
    

        return view('frais_configurations.index',compact('schools','frais_configurations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::all();
        return view('frais_configurations.create',compact('schools'));
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
        $this->validate($request,[

                'school_id'=>'required',
                'annee_id'=>'required',
                'frais_id'=>'required',
                'classe_id'=>'required',
                'echeance_id'=>'required',
                'montant'=>'required'
       ]);

        $frais_config = new FraisConfig;

         if(!empty(isset($request->frais_obligatoire)) && ($request->frais_obligatoire == "on") ||  ($request->frais_obligatoire == "On")) {

            $frais_config->frais_obligatoire = 1;
            //$frais_config->save();

        }else{
                $frais_config->frais_obligatoire = 0;
                //$frais_config->save();

        }

                $frais_config->school_id=$request->school_id;
                $frais_config->annee_id=$request->annee_id;
                $frais_config->frais_id=$request->frais_id;
                $frais_config->classe_id=$request->classe_id;
                $frais_config->echeance_id=$request->echeance_id;
                $frais_config->montant=$request->montant;

                $frais_config->save();
      


         flash('Frais configure avec succès.')->success();
        return redirect()->route('frais_configs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FraisConfig  $fraisConfig
     * @return \Illuminate\Http\Response
     */
    public function show(FraisConfig $fraisConfig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FraisConfig  $fraisConfig
     * @return \Illuminate\Http\Response
     */
    public function edit(FraisConfig $fraisConfig)
    {
        $schools = School::all(); 
        $frais_configurations = FraisConfig::all();
        // $annees = Annee::all();
        
        return view('frais_configurations.edit',compact('fraisConfig','schools','frais_configurations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FraisConfig  $fraisConfig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FraisConfig $fraisConfig)
    {
        $this->validate($request,[

                'school_id'=>'required',
                'annee_id'=>'required',
                'frais_id'=>'required',
                'montant' =>'required'
       ]);

        $fraisConfig->update([
            'frais_id' => $request->frais_id,
            'annee_id' => $request->annee_id,
            'school_id' => $request->school_id,
            'classe_id' => $request->classe_id,
            'echeance_id' => $request->echeance_id,
            'montant'  => $request->montant
        ]);

        flash('Frais de configuration modifié avec succès.')->success();
        
        return redirect()->route('frais_configs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FraisConfig  $fraisConfig
     * @return \Illuminate\Http\Response
     */
    public function destroy(FraisConfig $fraisConfig)
    {
        $fraisConfig->delete();

         flash('Article  supprime avec succès.')->success();
        return redirect()->route('frais_configs.index');
    }

     public function search(Request $request) {

        $frais_configs = FraisConfig::all();
        $schools = School::all();
    $constraints = [
            'school_id' => $request->school_id,
            'annee_id' => $request->annee_id,
            ];

       $frais_configurations = $this->doSearchingQuery($constraints);

      // dd($frais_configurations);

       return view('frais_configurations.index', ['frais_configurations' => $frais_configurations, 'searchingVals' => $constraints,'schools'=>$schools,'frais_configs'=>$frais_configs,'ok'=>1]);
    }

    private function doSearchingQuery($constraints) {
        $query = FraisConfig::all();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where( $fields[$index],$constraint);
                
            }
            $index++;
        }
        return $query;
    }
}
