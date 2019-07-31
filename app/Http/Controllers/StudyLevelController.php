<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyLevel;
use App\Models\School;
use Auth;

class StudyLevelController extends Controller
{
    public function index()
    {
        if( isset(Auth::user()->school->id) && !empty(Auth::user()->school->id) ) {
            $study_levels = Auth::user()->school->study_levels;
        } else {
            $study_levels = StudyLevel::all();
        }
        return view('study_levels.index', compact('study_levels'));
    }

    public function create()
    {
        if( isset(Auth::user()->school->id) && !empty(Auth::user()->school->id) ) {
            $schools = array(Auth::user()->school);
        } else {
            $schools = School::all();
        }
        return view('study_levels.create', compact('schools'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|string|max:191',
           'school_id' => 'required'
       ]);

       $niveau = StudyLevel::create($request->all());

       flash('Niveau enregistré avec succès !')->success();
       return redirect()->route('studylevels.index');
    }

    public function show($id)
    {
        $niveau = StudyLevel::findOrFail($id);
        return view('study_levels.show', compact('niveau'));
    }

    public function edit($id)
    {
        $niveau = StudyLevel::findOrFail($id);
        if( isset(Auth::user()->school->id) && !empty(Auth::user()->school->id) ) {
            $schools = array(Auth::user()->school);
        } else {
            $schools = School::all();
        }
        return view('study_levels.edit', compact('niveau', 'schools'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'name' => 'required|string|max:191',
           'school_id' => 'required'
       ]);

       $niveau = StudyLevel::findOrFail($id);
       $niveau->update($request->all());

       flash('Niveau modifié !')->warning();
       return redirect()->route('studylevels.index');
    }

    public function destroy($id)
    {
        $niveau = StudyLevel::findOrFail($id);

        if($niveau->classes->count() == 0) {
            $niveau->delete();
            flash('Niveau supprimé !');
        } else {
            flash('Impossible de supprimer ce niveau')->error();
        }
        return redirect()->route('studylevels.index');
    }
}
