<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\StudyLevel;
use App\Models\School;
use Illuminate\Http\Request;
use Auth;

class ClasseController extends Controller
{
    public function index()
    {
        if( isset(Auth::user()->school_id) && !empty(Auth::user()->school_id) ) {
            $classes = Auth::user()->school->classes;
        } else {
            $classes = Classe::all();
        }
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        if( isset(Auth::user()->school_id) && !empty(Auth::user()->school_id) ) {
            $schools = array(School::findOrFail(Auth::user()->school_id));
            $study_levels = Auth::user()->school->study_levels;
        } else {
            $schools = School::all();
            $study_levels = StudyLevel::all();
        }
        return view('classes.create', compact('schools', 'study_levels'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|string|max:191',
           'study_level' => 'required|integer',
           'student_effectif'=> 'required|integer',
       ]);

       $study_level = StudyLevel::findOrFail($request->study_level);

       $classe = Classe::create([  
           'name' => $request->name,
           'student_effectif' => $request->student_effectif,
           'study_level_id' => $request->study_level,
           'school_id' => $study_level->school_id
       ]);

       flash('Classe enregistrée avec succès !')->success();
       return redirect()->route('classes.index');
    }

    public function show($id)
    {
        $classe = Classe::findOrFail($id);
        return view('classes.show', compact('classe'));
    }

    public function edit($id)
    {
        $classe = Classe::findOrFail($id);

        if( isset(Auth::user()->school_id) && !empty(Auth::user()->school_id) ) {
            $schools = array(School::findOrFail(Auth::user()->school_id));
            $study_levels = Auth::user()->school->study_levels;
        } else {
            $schools = School::all();
            $study_levels = StudyLevel::all();
        }
        return view('classes.edit', compact('classe', 'schools', 'study_levels'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'study_level' => 'required|integer',
            'student_effectif'=> 'required|integer',
        ]);

        $study_level = StudyLevel::findOrFail($request->study_level);

        $classe = Classe::findOrFail($id);

        $classe->update([
            'name' => $request->name,
            'student_effectif' => $request->student_effectif,
            'study_level_id' => $request->study_level,
            'school_id' => $study_level->school_id
        ]);

        flash('Classe modifiée avec succès !')->success();
        return redirect()->route('classes.index');
    }

    public function destroy($id)
    {
        $classe = Classe::findOrFail($id);
        $classe->delete();
        
        flash('Classe supprimée !');
        return redirect()->route('classes.index');
    }
}
