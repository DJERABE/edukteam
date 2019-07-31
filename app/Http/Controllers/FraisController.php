<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Frais;
use App\Models\School;

class FraisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frais = Frais::all();
        //dd($frais->school->nom);
        return view('frais.index',compact('frais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::all();
        return view('frais.create',compact('schools'));
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

        Frais::create([
                'nom'=>$request->nom,
                'school_id'=>$request->school
        ]);


         flash('Nouvel article enregistré avec succès.')->success();
        return redirect()->route('frais.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Frais $frai)
    {
        $schools = School::all(); 
        //$frais  = Frais::findOrFail($frais);
        return view('frais.edit',compact('frai','schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Frais $frai)
    {
                $this->validate($request,[

                'nom'=>'required',
                'school'=>'integer'
       ]);

             $frai->update([
                'nom'=>$request->nom,
                'school_id'=>$request->school
        ]);


         flash('Nouvel article modifie avec succès.')->success();
        return redirect()->route('frais.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frais $frai)
    {
        $frai->delete();

         flash('Article  supprime avec succès.')->success();
        return redirect()->route('frais.index');
    }
}
