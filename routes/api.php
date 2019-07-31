<?php
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\StudyLevel;
use App\Models\Student;
use App\Models\Classe;
use App\Models\ExpenseConfiguration;
use App\Models\StudentBill;
use App\Models\AcademicYear;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/schools/{school_id}/classes', function($school_id) {
    $study_levels = School::find($school_id)->classes;
    return $study_levels;
});

/** */
    Route::get('/schools/{school_id}/academicyears', function($school_id) {
        $academic_years = School::find($school_id)->academic_years->where('is_active', 1);
        return $academic_years;
    });
/** */

Route::get('/schools/{school_id}/expenses', function($school_id) {
    $expenses = School::find($school_id)->expenses;
    return $expenses;
});

Route::get('/studylevels/{studylevel_id}/classes', function($studylevel_id) {
    $classes = StudyLevel::findOrFail($studylevel_id)->classes;
    return $classes;
});

Route::get('/schools/{school_id}/classes', function($school_id) {
    $classes = School::find($school_id)->classes;
    return $classes;
});

Route::get('/schools/{school_id}/studylevels', function($school_id) {
    $studylevels = School::find($school_id)->study_levels;
    return $studylevels;
});

Route::get('/classes/{classe_id}/students',function($classe_id){
   $students = Classe::findOrFail($classe_id)->students;
   return $students;
});

Route::get('/classes/{classe_id}/expense_configurations',function($classe_id){
   $expense_configurations = Classe::findOrFail($classe_id)->study_level->expense_configurations;
   return $expense_configurations;
});

Route::get('/academicyear/{academic_year_id}/sessions', function($academicyear_id) {
    $sessions = AcademicYear::find($academicyear_id)->sessions;
    return $sessions;
});

Route::get('/subject/{subject_id}/professors', function($subject_id) {
    $professors = DB::table('professor_subject')
        ->join('professors', 'professor_subject.professor_id', '=', 'professors.id')
        ->where('professor_subject.subject_id', $subject_id)
        ->get();
    return $professors;
});




Route::get('/get/{school_id}',function($school_id){

    $data =School::with('academic_years')->with('expenses')->with('classes')->where('id',$school_id)->get() ;
    
    return $data;
});

 Route::get('/getetudiant/{classe_id}',function($classe_id){

    $data =Classe::with('students')->where('id',$classe_id)->get() ; 
    return $data;
});



Route::get('/getannee/{studylevel_id }',function($studylevel_id){ 
    
    return $data;
});


Route::get('/niveau/{classe_id}/classes',function($classe_id){
$students = StudyLevel::findOrFail($classe_id)->classes;
// $students = Classe::all();
return $students;
});

Route::post('formulaire', 'UserController@formulaire');
