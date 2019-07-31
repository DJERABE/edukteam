<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guardian;
use App\Models\Student;
use App\Models\GuardianType;

class GuardianController extends Controller
{
    public function index() {
        $guardians = Guardian::all();
        return view('guardians.index', compact('guardians'));
    }

    public function create($student_id) {
        $student = Student::findOrFail($student_id);
        $types = GuardianType::all();
        return view('guardians.create', compact('student', 'types'));
    }

    public function store(Request $request, $student_id) {
        
        $this->validate($request, [
            "guardian_type" => "required|integer",
            "last_name" => "required|string|max:191",
            "given_names" => "required|string|max:191",
            "career" => "required|string|max:191",
            "employer" => "required|string|max:191",
            "mailing_address" => "required|string|max:191",
            "tel_work" => "required|string|max:191",
            "tel_home" => "required|string|max:191",
            "cell" =>"required|string|max:191",
            "email" => "required|string|max:191|unique:guardians",
            "address" => "required|string|max:191"
        ]);
        
        $student = Student::findOrFail($student_id);
        $guardian = Guardian::create([
            "guardian_type_id" => $request->guardian_type,
            "last_name" => $request->last_name,
            "given_names" => $request->given_names,
            "career" => $request->career,
            "employer" => $request->employer,
            "mailing_address" => $request->mailing_address,
            "tel_work" => $request->tel_work,
            "tel_home" => $request->tel_home,
            "cell" => $request->cell,
            "email" => $request->email,
            "address" => $request->address
        ]);

        $guardian->students()->attach($student->id);

        flash('Parent enregistré avec succès !')->success();
        return redirect()->route('guardians.index');
    }

    public function show($id) {
        $guardian = Guardian::findOrFail($id);
        return view('guardians.show', compact('guardian'));
    }

    public function edit($id) {
        $guardian = Guardian::findOrFail($id);
        $types = GuardianType::all();
        return view('guardians.edit', compact('guardian', 'types'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            "guardian_type" => "required|integer",
            "last_name" => "required|string|max:191",
            "given_names" => "required|string|max:191",
            "career" => "required|string|max:191",
            "employer" => "required|string|max:191",
            "mailing_address" => "required|string|max:191",
            "tel_work" => "required|string|max:191",
            "tel_home" => "required|string|max:191",
            "cell" =>"required|string|max:191",
            "email" => "required|string|max:191|unique:guardians,email,".$id,
            "address" => "required|string|max:191"
        ]);
        $guardian = Guardian::findOrFail($id);
        $guardian->update([
            "guardian_type_id" => $request->guardian_type,
            "last_name" => $request->last_name,
            "given_names" => $request->given_names,
            "career" => $request->career,
            "employer" => $request->employer,
            "mailing_address" => $request->mailing_address,
            "tel_work" => $request->tel_work,
            "tel_home" => $request->tel_home,
            "cell" => $request->cell,
            "email" => $request->email,
            "address" => $request->address
        ]);

        flash('Parent mis à jour !')->warning();
        return redirect()->route('guardians.index');
    }

    public function destroy($id) {
        $guardian = Guardian::findOrFail($id);
        $guardian->delete();

        flash('Parent supprimé !');
        return redirect()->route('guardian.index');
    }
}
