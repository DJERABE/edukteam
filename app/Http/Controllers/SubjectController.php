<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\SubjectCategory;
use App\Models\School;
use Illuminate\Http\Request;
use Auth;

class SubjectController extends Controller
{
    public function index()
    {
        if(Auth::user()->school_id == null) {
            $subjects = Subject::all();
        } else {
            $subjects = collect(Subject::where('school_id', Auth::user()->school_id)->get());
        }
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        if(Auth::user()->school_id == null) {
            $schools = School::all();
            $categories = SubjectCategory::all();
        } else {
            $schools = array(Auth::user()->school);
            $categories = SubjectCategory::where('school_id', Auth::user()->school_id)->get();
        }
        return view('subjects.create', compact('schools', 'categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|string|max:191',
           'category' => 'required|integer',
           'school' => 'required|integer'
       ]);

       $subject = Subject::create([
           'name' => $request->name,
           'category_id' => $request->category,
           'school_id' => $request->school
       ]);


     flash('Matière enregistrée avec succès !')->success();
       return redirect()->route('subjects.index');
    }

    public function show(Subject $subject)
    {
        return view('subjects.show', compact('subject'));
    }

    public function edit(Subject $subject)
    {
        if(Auth::user()->school_id == null) {
            $schools = School::all();
            $categories = SubjectCategory::all();
        } else {
            $schools = array(Auth::user()->school);
            $categories = SubjectCategory::where('school_id', Auth::user()->school_id)->get();
        }
        return view('subjects.edit', compact('subject', 'schools', 'categories'));
    }

    public function update(Request $request, Subject $subject)
    {
        $this->validate($request, [
           'name' => 'required|string|max:191',
           'category' => 'required|integer',
           'school' => 'required|integer'
       ]);

       $subject->update([
           'name' => $request->name,
           'category_id' => $request->category,
           'school_id' => $request->school
       ]);

       flash('Matière mise à jour !')->warning();
       return redirect()->route('subjects.index');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        flash('Matière supprimée !');
        return redirect()->route('subjects.index');
    }
}
