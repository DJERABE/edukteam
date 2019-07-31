<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\MedicalHistory;
use App\Models\Allergy;
use App\Models\ChildhoodDisease;
use App\Models\GuardianType;
use App\Models\Guardian;
use App\Models\School;
use App\Models\BloodGroup;
use App\Models\Classe;
use App\Models\StudyLevel;
use Illuminate\Support\Facades\Storage;
use Auth;
use GuzzleHttp\Client;
use File;
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
use App\Models\Familly;
use App\Models\Class_student;
use App\Models\AcademicYear; 

class StudentController extends Controller
{


        public function __construct() {


                $s3 = S3Client::factory(array(
                        'version' => 'latest',
                        'region'  => '',
                        'endpoint' => 'http://s3.eu-gb.objectstorage.softlayer.net/',
                        'credentials' => array(
                                'key' => "6a130dd225c542fd8cc22d6da5d1adee",
                                'secret' => "e6f888f5a5268b638ecfd3ce9196d6654848372b382fad16"
                        )
                ));

                $this->s3 = $s3;
        }

        public function index()
        {
                if(Auth::user()->school_id == null) { 
                        $academique =AcademicYear::where('is_active',1)->get();
                        $niveaux =StudyLevel::all(); 
                } else { 
                        $academique =AcademicYear::where('school_id',Auth::user()->school->id)->where('is_active',1)->get();
                        $niveaux =StudyLevel::where('school_id',Auth::user()->school->id)->get()->sortBy('name'); 
                        // $datas =StudyLevel::where('school_id',Auth::user()->school->id)->get(); 
                }
                // dd($niveaux);
                return view('students.index', compact('expense_configurations', 'academique', 'niveaux'));
        }

public function create()
{ 
        if(Auth::user()->school_id == null) {
                $schools = School::all();
                $students = Student::all(); 
        } else {
                $schools = array(School::findOrFail(Auth::user()->school_id));
                $students_list = Student::where('school_id',Auth::user()->school_id)->orderBy('last_name')->get(); 
                $students = [];
                foreach ($students_list as $key => $student) { 
                    if($student->classes->count()==0){
                        $students[$key] = $student; 
                    }
                }
                  
        }
        $guardian_types = GuardianType::all();
      
        $families = Familly::where('school_id',Auth::user()->school_id)->get();
        return view('students.create', compact('schools', 'guardian_types', 'students','families'));
}

public function store(Request $request)
{ 
        $this->validate($request, [
                "school" => "required|integer",
                "academic_year" => "required|integer",
                "student" => "required",
                "matricule" => "nullable|string|max:191",
                "code"=>"nullable|string|max:191",
                "last_name" => "nullable|required_if:student,new-student|string|max:191",
                "given_names" => "nullable|required_if:student,new-student|string|max:191",
                "dob" => "nullable|required_if:student,new-student|before:today",
                "place_birth" => "nullable|string|max:191",
                "citizenship" => "nullable|required_if:student,new-student|string|max:191",
                "address" => "nullable|required_if:student,new-student|string|max:191",
                "studylevel" => "nullable",
                "class" => "nullable",
                "previous_school" => "required|string|max:191",
                "academic_file.*" => "nullable|file|mimes:jpeg,png,jpg,pdf,doc,docx|max:2048",
                "student_avatar" => "nullable|file|mimes:jpeg,png,jpg",
                'family'=>'nullable|required_if:student,new-student|integer' ,
        ]); 
        $uploadImage = $request->file('academic_file');
        $images=[];
        $i=1;
        if ($request->hasFile('academic_file')) {
                 foreach ($uploadImage as $value) {
                        $file_name =str_slug($value->getClientOriginalName().$i). '.' .$value->getClientOriginalExtension();;
                        $image = $value->storePubliclyAs(
                                'public/images/files_academics', $file_name    
                        );
                        $images[] = 'images/files_academics/'.$file_name; 
                        $i++;
                }
        }else{
                $images[] = 'N/A';
        } 
        if($request->class == null ||$request->studylevel==null  ){
                $student_id = $this->get_student($request);
        }else{
                $student_id = $this->get_student($request);
                $classe = Classe::findOrFail($request->class);
                $classe->students()->attach($student_id, [
                        'classe_id' => (int)$request->class,
                        'school_id' => $request->school,
                        'academic_year_id' => $request->academic_year,
                        'studylevel_id' => (int)$request->studylevel,
                        'previous_school' => $request->previous_school,
                        'academic_file' => implode("|",$images) 
                ]); 
        } 
        flash('Inscription effectuée !');
        return redirect()->route('students.show', $student_id);
}


public function show(Student $student)
{
        $age = Student::calcul_age(date("d-m-Y", strtotime($student->dob)));
        return view('students.show', compact('student','age'));
}

public function restoreShow($id)
{
        $student = Student::findOrFail($id);
        $age = Student::calcul_age(date("d-m-Y", strtotime($student->dob)));
        return view('students.show', compact('student','age'));
}

public function get_image(Student $student){

        foreach($student->classes as $class){
                $images = explode('|',$class->pivot->academic_file);       
        }
        return view('students.academic_file', compact('student','images'));
}

public function edit(Student $student)
{ 
        $guardian_types = GuardianType::all();
        $familles = Familly::where('school_id',$student->school_id)->get();
        $blood_groups = BloodGroup::all(); 
        $classes = $student->school_id;
        // $studylevels = StudyLevel::where('school_id',$student->school_id)->get(); 
        // dd($studylevels);
        return view('students.edit', compact('student', 'guardian_types', 'blood_groups','classes','studylevels','familles'));
}

public function update(Request $request, Student $student)
{
        $this->validate($request, [
                'matricule' => 'nullable|string|max:191|',
                'last_name' => 'required|string|max:191',
                'given_names' => 'required|string|max:191',
                'dob' => 'required',
                'familly_id' => 'required',
                'place_birth' => 'nullable|string|max:191',
                'citizenship' => 'required|string|max:191',
                'address' => 'required|string|max:191',
                'code' => 'nullable|string|max:191', 
        ]);
        $student->update([
                'matricule' => $request->matricule,
                'code' => $request->code,
                'last_name' => $request->last_name,
                'given_names' => $request->given_names,
                'dob' => date("Y-m-d", strtotime($request->dob)),
                'place_birth' => $request->place_birth,
                'citizenship' => $request->citizenship,
                'address' => $request->address, 
                'familly_id' => $request->familly_id, 
                ]); 
        flash('Élève mis à jour !')->warning();
        return redirect()->route('students.show', $student->id); 
}

public function trashed(){
   $students = Student::onlyTrashed()->get();
   return view('students.trashed', compact('students'));
}

public function destroy(Student $student)
{
   $student->delete();
   flash('Élève mis en corbeille!')->warning();
   return redirect()->back();
}

public function restore($id){
        Student::withTrashed()->where('id', $id)->restore();
        return redirect()->route('students.index');
}



        private function get_student($request) {
                $student = []; 
                if($request->student == 'new-student') {  
                        $student = new Student; 
                if ($request->hasFile('student_avatar')) { 
                        $uploadImage = $request->file('student_avatar');
                        $file = $_FILES['student_avatar'];
                        $name = $file['name'];
                        $tmp_name = $file['tmp_name'];
                        $ext = explode('.',$name);
                        $ext = strtolower(end($ext));
                        $key = md5(uniqid());
                        $tmp_file_name = "{$key}.{$ext}";
                        $temp_file_path = "uploads/{$tmp_file_name}";
                        move_uploaded_file($tmp_name,$temp_file_path);
                        try{
                                $this->s3->putObject(array(
                                'Bucket' => "eschool-bucket-2",
                                'Key' => $name,
                                'Body' => fopen($temp_file_path,'rb'),
                                'ACL' => 'public-read'
                        ));
                        }catch(S3Exception $e){ 
                                die('There was some type of upload issue' .$e->getMessage());
                        } 
                        unlink($temp_file_path); 
                }else{ 
                        try{ 
                                $this->s3->putObject(array(
                                        'Bucket' => "eschool-bucket-2",
                                        'Key' => "students/avatar_default.jpg",
                                        'Body' => fopen("uploads/avatar_default.jpg",'rb'),
                                        'ACL' => 'public-read'
                                )); 
                        }catch(S3Exception $e){ 
                                die('There was some type of upload issue' .$e->getMessage());
                        } 
                } 
                        $student->matricule = $request->matricule;
                        $student->code = $request->code;
                        $student->school_id = $request->school;
                        $student->last_name = $request->last_name;
                        $student->given_names = $request->given_names;
                        $student->dob = date("Y-m-d", strtotime($request->dob));
                        $student->place_birth = $request->place_birth;
                        $student->citizenship = $request->citizenship;
                        $student->address = $request->address;
                        $student->familly_id = $request->family; 
                        $student->student_avatar = (!empty($name))?$name:"avatar_default.jpg"; 
                        $student->save();
                } else {
                        $student = Student::findOrFail($request->student);
                }
                return $student->id; 
        } 

        public function filtres(Request $request)
        {  
                // dd('nnj');
                 
                $class_students= Class_student::where('academic_year_id',$request->annee)->where('classe_id',$request->classe)->get();
                // dd($class_students);
                $academique =AcademicYear::where('school_id',Auth::user()->school->id)->where('is_active',1)->get();
                $niveaux =StudyLevel::where('school_id',Auth::user()->school->id)->get(); 
                return view('students.recherche', compact('academique', 'niveaux','class_students'));
        }
}
