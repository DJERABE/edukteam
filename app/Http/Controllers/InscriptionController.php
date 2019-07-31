<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\School;
use App\Models\GuardianType;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Auth;

class InscriptionController extends Controller
{
    public function index()
    {
        $inscriptions = Inscription::all();
        return view('inscriptions.index', compact('inscriptions'));
    }

    public function create()
    {
        if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('manager')) {
            $schools = School::all();
        } else {
            $schools = array(School::findOrFail(Auth::user()->school_id));
        }
        $guardian_types = GuardianType::all();
        $students = Student::all();
        return view('inscriptions.create', compact('schools', 'guardian_types', 'students'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "school" => "required|integer",
            "academic_year" => "required|integer",
            "student" => "required",
            "matricule" => "nullable|required_if:student,new-student|string|max:191",
            "last_name" => "nullable|required_if:student,new-student|string|max:191",
            "given_names" => "nullable|required_if:student,new-student|string|max:191",
            "dob" => "nullable|required_if:student,new-student|date_format:d/m/Y|before:today",
            "place_birth" => "nullable|required_if:student,new-student|string|max:191",
            "citizenship" => "nullable|required_if:student,new-student|string|max:191",
            "address" => "nullable|required_if:student,new-student|string|max:191",
            "county" => "nullable|required_if:student,new-student|string|max:191",
            "district" => "nullable|required_if:student,new-student|string|max:191",
            "street_no" => "nullable|required_if:student,new-student|string|max:191",
            "studylevel" => "required|integer",
            "class" => "required|integer",
            "previous_school" => "required|string|max:191",
            "academic_file" => "required|file|mimes:jpeg,png,jpg,pdf,doc,docx"
        ]);

        $inscription = new Inscription;
        $inscription->school_id = $request->school;
        $inscription->academic_year_id = $request->academic_year;
        $inscription->student_id = $this->get_student($request);
        $inscription->study_level_id = $request->studylevel;
        $inscription->class_id = $request->class;
        $inscription->previous_school = $request->previous_school;
        $inscription->academic_file = Storage::disk('academic_files')->put('', $request->academic_file);
        $inscription->save();

        flash('Inscription effectué !');
        return redirect()->route('students.show', $inscription->student_id);

    }

    public function show(Inscription $inscription) {
        return view('inscriptions.show', compact('inscription'));
    }

    private function get_student($request) {
        $student = [];
        if($request->student == 'new-student') {
            $student = new Student;
            $student->matricule = $request->matricule;
            $student->last_name = $request->last_name;
            $student->given_names = $request->given_names;
            $student->dob = date("Y-m-d", strtotime($request->dob));
            $student->place_birth = $request->place_birth;
            $student->citizenship = $request->citizenship;
            $student->address = $request->address;
            $student->county = $request->county;
            $student->district = $request->district;
            $student->street_no = $request->street_no;
            $student->save();
        } else {
            $student = Student::findOrFail($request->student);
        }
        return $student->id;
    }
}
