<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectCategory;
use Auth;

class SubjectCategoryController extends Controller
{
    public function index()
    {
        if(Auth::user()->school_id == null) {
            $subject_categories = SubjectCategory::all();
        } else {
            $subject_categories = collect(SubjectCategory::where('school_id', Auth::user()->school_id)->get());
        }
        return view('subject_categories.index', compact('subject_categories'));
    }

    public function create()
    {
        if(Auth::user()->school_id == null) {
            $schools = School::all();
        } else {
            $schools = array(Auth::user()->school);
        }
        return view('subject_categories.create', compact('schools'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|string|max:191',
           'school' => 'required'
       ]);

       $subject_category = SubjectCategory::create([
           'name' => $request->name,
           'school_id' => $request->school
       ]);

       flash('Catégorie enregistrée avec succès !')->success();
       return redirect()->route('subjectcategories.index');
    }

    public function show($id)
    {
        return redirect()->back();
    }

    public function edit($id)
    {
        $category = SubjectCategory::findOrFail($id);
        if(Auth::user()->school_id == null) {
            $schools = School::all();
        } else {
            $schools = array(Auth::user()->school);
        }
        return view('subject_categories.edit', compact('category', 'schools'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'name' => 'required|string|max:191',
           'school' => 'required|integer'
       ]);

       $subject_category = SubjectCategory::findOrFail($id);
       $subject_category->update($request->all());

       flash('Catégorie modifiée !')->warning();
       return redirect()->route('subjectcategories.index');
    }

    public function destroy($id)
    {
        $subject_category = SubjectCategory::findOrFail($id);
        $subject_category->delete();
        flash('Catégorie supprimée !');
        return redirect()->route('subjectcategories.index');
    }
}
