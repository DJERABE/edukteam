<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\School;
use App\Models\AcademicYear;
use Illuminate\Http\Request;
use Auth;

class SessionController extends Controller
{
    public function index()
    {   
        if(Auth::user()->school_id == null) {
            $sessions = Session::all();
        } else {
            $sessions = Session::where('school_id', Auth::user()->school_id)->get();
        }
        return view('sessions.index', compact('sessions'));
    }

    public function create()
    {
        if(Auth::user()->school_id == null) {
            $schools = School::all();
            $academic_years = AcademicYear::all();
        } else {
            $schools = array(Auth::user()->school);
            $academic_years = AcademicYear::where('school_id', Auth::user()->school_id)->get();
        }
        return view('sessions.create', compact('schools', 'academic_years'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required|string|max:191",
            "start" => "required|date",
            "end" => "required|date",
            "academic_year" => "required|integer",
            "school" => "required|integer"
        ]);

        $session = Session::create([
            "name" => $request->name,
            "start" => date("Y-m-d", strtotime($request->start)),
            "end" => date("Y-m-d", strtotime($request->end)),
            "academic_year_id" => $request->academic_year,
            "school_id" => $request->school
        ]);

        flash('Session enregistrée avec succès !')->success();
        return redirect()->route('sessions.index');
    }

    public function show(Session $session)
    {
        return view('sessions.show', compact('session'));
    }

    public function edit(Session $session)
    {
        if(Auth::user()->school_id == null) {
            $schools = School::all();
            $academic_years = AcademicYear::all();
        } else {
            $schools = array(Auth::user()->school);
            $academic_years = AcademicYear::where('school_id', Auth::user()->school_id)->get();
        }
        return view('sessions.edit', compact('session', 'schools', 'academic_years'));
    }

    public function update(Request $request, Session $session)
    {
        $this->validate($request, [
            "name" => "required|string|max:191",
            "start" => "required|date",
            "end" => "required|date",
            "academic_year" => "required|integer",
            "school" => "required|integer"
        ]);

        $session->update([
            "name" => $request->name,
            "start" => date("Y-m-d", strtotime($request->start)),
            "end" => date("Y-m-d", strtotime($request->end)),
            "academic_year_id" => $request->academic_year,
            "school_id" => $request->school
        ]);

        flash('Session mise à jour !')->success();
        return redirect()->route('sessions.index');
    }

    public function destroy(Session $session)
    {
        $session->delete();
        flash('Session supprimée !');
        return redirect()->route('sessions.index');
    }
}
