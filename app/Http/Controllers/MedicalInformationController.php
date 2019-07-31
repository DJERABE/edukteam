<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalInformation;
use App\Models\BloodGroup;
use App\Models\Student;

class MedicalInformationController extends Controller
{
    public function create($student_id) {
        $student = Student::findOrFail($student_id);
        $blood_groups = BloodGroup::all();
        return view('medical_informations.create', compact('blood_groups', 'student'));
    }

    public function store(Request $request, $student_id) {
        // dd($request->all());
        $this->validate($request, [
            'blood_group' => 'required|string',
            'emergency_clinic' => 'nullable|string|max:191', 
            'family_doctor' => 'nullable|string|max:191',
            'family_doctor_tel' => 'nullable|string', 
            'medical_history' => 'nullable|string',
            'allergies' => 'nullable|string',
            'childhood_diseases' => 'nullable|string'
        ]);

        $student = Student::findOrFail($student_id);

        $medical_information = MedicalInformation::create([
            'bloodgroup_id' => $request->blood_group,
            'emergency_clinic' => $request->emergency_clinic,

            'family_doctor' => $request->family_doctor,
            'family_doctor_tel' => $request->family_doctor_tel,

            'medical_history' => $request->medical_history,
            'allergies' => $request->allergies,
            'childhood_diseases' => $request->childhood_diseases,
            'student_id' => $student->id
        ]);

        flash('Dossier médical enregistré avec succès.')->success();
        return redirect()->route('students.show', $student->id);
    }

    public function edit($id) {
        $medical_information = MedicalInformation::findOrFail($id);
        $blood_groups = BloodGroup::all();
        return view('medical_informations.edit', compact('medical_information', 'blood_groups'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'blood_group' => 'required|string|max:191',
            'emergency_clinic' => 'nullable|string|max:191',

            'family_doctor' => 'nullable|string|max:191',
            'family_doctor_tel' => 'nullable|string',

            'medical_history' => 'nullable|string',
            'allergies' => 'nullable|string',
            'childhood_diseases' => 'nullable|string'
        ]);
        
        $medical_information = MedicalInformation::findOrFail($id);
        $medical_information->update([
            'bloodgroup_id' => $request->blood_group,
            'emergency_clinic' => $request->emergency_clinic,

            'family_doctor' => $request->family_doctor,
            'family_doctor_tel' => $request->family_doctor_tel,

            'medical_history' => $request->medical_history,
            'allergies' => $request->allergies,
            'childhood_diseases' => $request->childhood_diseases
        ]);

        flash('Dossier médical mis à jour.')->warning();
        return redirect()->route('students.show', $medical_information->student->id);
    }
}
