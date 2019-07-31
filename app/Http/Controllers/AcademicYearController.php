<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicYear;
use App\Models\School;
use App\Traits\Authorizable;
use Auth;

class AcademicYearController extends Controller
{
    public function index()
    {
        if(Auth::user()->school_id == null) {
            $academic_years = AcademicYear::all();
        } else {
            $academic_years = collect(Auth::user()->school->academic_years);
        }
        return view('academic_years.index', compact('academic_years'));
    }

    public function create()
    {
        if(Auth::user()->school_id == null) {
            $schools = School::all();
        } else {
            $schools = array(Auth::user()->school);
        }
        return view('academic_years.create',compact('schools'));
    }

    public function store(Request $request)
    {
         $this->validate($request, [
            'name' => 'required|string|max:191',
            'start' => 'required|date_format:d/m/Y',
            'end' => 'required|date_format:d/m/Y',
            'school_id' => 'required',
            'is_active' => 'nullable'
        ]);
        $academic_year = new AcademicYear;
        $academic_year->name = $request->name;
        $academic_year->start = date("Y-m-d", strtotime($request->start));
        $academic_year->end = date("Y-m-d", strtotime($request->end));
        $academic_year->school_id = $request->school_id;

        if(!empty($request->is_active) && isset($request->is_active) && (($request->is_active == "on") ||  ($request->is_active == "On"))) {
            $academic_year->is_active = 1;
        } else {
            $academic_year->is_active = 0;
        }

        $academic_year->save();

        flash('Année académique enregistrée avec success')->success();
        return redirect()->route('academicyears.index');
    }

   public function show(AcademicYear $academic_year)
    {
        return redirect()->back();
    }

    public function edit($id)
    {
        $academic_year = AcademicYear::findOrFail($id);
        if(Auth::user()->school_id == null) {
            $schools = School::all();
        } else {
            $schools = array(Auth::user()->school);
        }
        return view('academic_years.edit', compact('academic_year','schools'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'name' => 'required|string|max:191',
           'start' => 'required|date_format:d/m/Y',
           'end' => 'required|date_format:d/m/Y',
           'school_id' => 'required',
           'is_active' => 'nullable'
       ]);
       $academic_year = AcademicYear::findOrFail($id);

        if(!empty(isset($request->is_active)) && ($request->is_active == "on") ||  ($request->is_active == "On")) {
            $is_active = 1;
        } else {
            $is_active = 0;
        }

        $academic_year->update([
            'name' => $request->name,
            'start' => date("Y-m-d", strtotime($request->start)),
            'end' => date("Y-m-d", strtotime($request->end)),
            'school_id' => $request->school_id,
            'is_active' =>$is_active
        ]);

        flash('Année académique mise à jour !')->warning();
        return redirect()->route('academicyears.index');
    }

    public function destroy($id)
    {
        $academic_year = AcademicYear::findOrFail($id);
        $academic_year->delete();
        flash('Année académique supprimée !');
        return redirect()->route('academicyears.index');
        
    }
}
