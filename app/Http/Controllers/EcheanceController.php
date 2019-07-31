<?php

namespace App\Http\Controllers;

use App\Models\Echeance;
use App\Models\School;
use Illuminate\Http\Request;
use Auth;

class EcheanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $echeances = Echeance::all(); 
        return view('echeances.index',compact('echeances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        if(Auth::user()->school_id == null) {
            $schools = School::all(); 
        } else {
             $schools = array(Auth::user()->school);
        }
        return view('echeances.create',compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 
                'nom'=>'required',
                'school'=>'integer'
       ]);

        Echeance::create([
                'nom'=>$request->nom,
                'school_id'=>$request->school
        ]);


         flash('Nouvel Echéance enregistré avec succès.')->success();
        return redirect()->route('echeances.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Echeance  $echeance
     * @return \Illuminate\Http\Response
     */
    public function show(Echeance $echeance)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Echeance  $echeance
     * @return \Illuminate\Http\Response
     */
    public function edit(Echeance $echeance)
    {
       $schools = School::all(); 
        return view('echeances.edit',compact('echeance','schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Echeance  $echeance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Echeance $echeance)
    {
        $this->validate($request,[

                'nom'=>'required',
                'school'=>'integer'
       ]);

             $echeanceecheance->update([
                'nom'=>$request->nom,
                'school_id'=>$request->school
        ]);


         flash('Nouvel Echéance modifie avec succès.')->success();
        return redirect()->route('echeances.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Echeance  $echeance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Echeance $echeance)
    {
        $echeance->delete();

         flash('Echéance  supprime avec succès.')->success();
        return redirect()->route('echeances.index');
    }
}