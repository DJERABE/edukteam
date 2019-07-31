<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annee;
use App\Models\School;

class AnneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $annees = Annee::all();
        
        return view('annees.index', compact('annees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::all();
        return view ('annees.create',compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());
         $this->validate($request, [
            'session_period' => 'required|string|max:191',
            'session_startdate' => 'required|string|max:191',
            'session_name' => 'required|string|max:191',
            'session_enddate' => 'required',
            'school_id' => 'required'
            //'is_active' => 'required'
            
        ]);


        $annee = new Annee;

        if(!empty(isset($request->is_active)) && ($request->is_active == "on") ||  ($request->is_active == "On")) {

            $annee->is_active = 1;
        }else{
            $annee->is_active = 0;
        }

        $annee->session_enddate = $request->session_enddate;
        $annee->session_period  = $request->session_period;
        $annee->session_name    =$request->session_name;
        $annee->school_id       = $request->school_id;
        $annee->session_startdate = $request->session_startdate;

        $annee->save();

        flash('Annee Academique enreistree avec success')->success();

        return redirect()->route('annees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show(Annee $annee)
    {
        return redirect()->back();
    }

    public function edit(Annee $annee)
    {
        $schools = School::all();
        return view('annees.edit', compact('annee','schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annee $annee)
    {
        $this->validate($request, [
            'session_period' => 'required|string|max:191',
            'session_startdate' => 'required|string|max:191',
            'session_name' => 'required|string|max:191',
            'session_enddate' => 'required',
            'school_id' => 'required',
            'is_active' => 'required'
            
        ]);
        if(!empty(isset($request->is_active)) && ($request->is_active == "on") ||  ($request->is_active == "On")) {

            $is_active = 1;
        }else{

            $is_active = 0;
        }

        $annee->update([


             'session_period' => $request->session_period,
             'session_startdate' => $request->session_startdate,
            'session_name' => $request->session_name,
            'session_enddate' => $request->session_enddate,
            'school_id' => $request->school_id,
            'is_active' =>$is_active


        ]);

        flash('Annee Academique modifiée avec succès.')->success();
        return redirect()->route('annees.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $annee = new Annee;

        $annee->destroy($id);
         flash('Annee Academique supprime avec succès.')->success();
        return redirect()->route('annees.index');

    }
}
