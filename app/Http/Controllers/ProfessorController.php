<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\School;
use App\Models\Subject;
use Illuminate\Http\Request;
use Auth;

class ProfessorController extends Controller
{
    public function index()
    {
        $professors = Professor::all();
        return view('professors.index', compact('professors'));
    }

    public function create()
    {
        if(Auth::user()->school_id == null) {
            $schools = School::all();
            $subjects = Subject::all();
        } else {
            $schools = array(Auth::user()->school);
            $subjects = collect(Subject::where('school_id', Auth::user()->school->id)->get());
        }
        return view('professors.create', compact('schools', 'subjects'));
    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'nom' => 'required|min:2',
            'prenoms' => 'required|min:2',
            'contact_1' => 'required|min:11|max:12',
            'contact_2' => 'nullable|min:11|max:12',
            'email' => 'required|email|unique:professors',
            'school' => 'required|integer',
            'subject.*' => 'nullable|integer',
            'professor_files.*' =>"required|file|mimes:jpeg,png,jpg,pdf,doc,docx|max:2048",
        ]);
       

        $uploadImage = $request->professor_files;

        $images=[];

        $i=1;
        foreach ($uploadImage as $value) {

            $file_name =str_slug($request->nom.$i). '.' .$value->getClientOriginalExtension();;
            $image = $value->storePubliclyAs(
                'public/images/professor_files', $file_name    
            );

            $images[] = 'images/professor_files/'.$file_name; 
            $i++;
        }
//  dd($request->all());
        $professor = new Professor;
        $professor->nom = $request->nom;
        $professor->prenoms = $request->prenoms;
        $professor->contact_1 = $request->contact_1;
        $professor->contact_2 = $request->contact_2;
        $professor->email = $request->email;
        $professor->school_id = $request->school;
        $professor->professor_files = implode("|",$images);
        $professor->save();

        $professor->subjects()->attach($request->subject);

        flash('Professeur enregistré avec succès.')->success();
        return redirect()->route('professors.index');
    }



    public function show(Professor $professor)
    {
       
         $images = explode('|',$professor->professor_files);       
     
        return view('professors.show', compact('professor','images'));
    }

    public function edit(Professor $professor)
    {
        if(Auth::user()->school_id == null) {
            $schools = School::all();
            $subjects = Subject::all();
        } else {
            $schools = array(Auth::user()->school);
            $subjects = collect(Subject::where('school_id', Auth::user()->school->id)->get());
        }
        return view('professors.edit', compact('professor', 'schools', 'subjects'));
    }

    public function update(Request $request, Professor $professor)
    {
        $this->validate($request, [
            'nom' => 'required|min:2',
            'prenoms' => 'required|min:2',
            'contact_1' => 'required|min:11|max:12',
            'contact_2' => 'nullable|min:11|max:12',
            'email' => 'required|email|unique:professors,email,'.$professor->id,
            'school' => 'required|integer'
        ]);

        $professor->nom = $request->nom;
        $professor->prenoms = $request->prenoms;
        $professor->contact_1 = $request->contact_1;
        $professor->contact_2 = $request->contact_2;
        $professor->email = $request->email;
        $professor->school_id = $request->school;
        $professor->save();

        flash()->warning('Professeur mis à jour !');
        return redirect()->route('professors.index');
    }

    public function destroy(Professor $professor)
    {
        $professor->delete();

        flash('Professeur supprimé !');
        return redirect()->route('professors.index');
    }
}
