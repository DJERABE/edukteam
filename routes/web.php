<?php
use App\Http\Controllers\HomeController;
use App\Models\Matiere;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', function () {
        return view('index');
    });

    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::get('profil', 'UserController@showProfil')->name('profil.show');
    Route::post('profil', 'UserController@updateProfil')->name('profil.update');
    // Route::post('profils', 'UserController@updatepassword')->name('passwordupdate');
    Route::put('/profilpasswordupdate/{user_id}',
    [
        'uses'=>'UserController@updatepassword'
        ,'as'=>'passwordupdate'
    ]);

    Route::resource('schools', 'SchoolController');
    Route::resource('academicyears','AcademicYearController');
    Route::resource('sessions', 'SessionController');
    Route::resource('studylevels','StudyLevelController');
    Route::resource('classes','ClasseController');
    Route::resource('students','StudentController');

    Route::resource('inscriptions','InscriptionController');

    Route::get('guardians', 'GuardianController@index')->name('guardians.index');

    Route::get('guardians/{student}/create', 'GuardianController@create')->name('guardians.create');
    Route::post('guardians/{student}', 'GuardianController@store')->name('guardians.store');

    Route::get('guardians/{student}', 'GuardianController@show')->name('guardians.show');

    Route::get('guardians/{guardian}/edit', 'GuardianController@edit')->name('guardians.edit');
    Route::put('guardians/{guardian}/update', 'GuardianController@update')->name('guardians.update');

    Route::delete('guardians/{guardian}', 'GuardianController@destroy')->name('guardians.destroy');

    
    Route::get('medicalinformations/{student}/create', 'MedicalInformationController@create')->name('medicalinformations.create');
    Route::post('medicalinformations/{student}', 'MedicalInformationController@store')->name('medicalinformations.store');

    Route::get('medicalinformations/{medicalinformation}/edit', 'MedicalInformationController@edit')->name('medicalinformations.edit');
    Route::put('medicalinformations/{medicalinformation}', 'MedicalInformationController@update')->name('medicalinformations.update');

    
    Route::resource('subjectcategories', 'SubjectCategoryController');
    Route::resource('subjects', 'SubjectController');
    Route::resource('professors', 'ProfessorController');
    Route::resource('expenses', 'ExpenseController');
    Route::resource('expense-configurations', 'ExpenseConfigurationController');

    Route::get('timetables/{class}/create', 'TimetableController@create')->name('timetables.create');
    Route::post('timetables/{class}', 'TimetableController@store')->name('timetables.store');
    Route::get('timetables/{timetable}', 'TimetableController@show')->name('timetables.show');


    Route::get('day-timetable/{timetable}/create', 'TimetableController@createDay')->name('day.timetable.create');
    Route::post('day-timetable/{timetable}/store', 'TimetableController@storeDay')->name('day.timetable.store');
    Route::get('day-timetable/{timetable}/edit', 'TimetableController@editDay')->name('day.timetable.edit');
    Route::post('day-timetable/{timetable}/update', 'TimetableController@updateDay')->name('day.timetable.update');
    Route::delete('day-timetable/{timetable}/{day}/destroy', 'TimetableController@destroyDay')->name('day.timetable.destroy');


    Route::get('day/subject/{timetable}/{day}/create', 'TimetableController@createDaySubject')->name('day.subject.create');
    Route::post('day/subject/{timetable}/{day}', 'TimetableController@storeDaySubject')->name('day.subject.store');

    Route::delete('day/subject/{timetable}/{day}/{subject}/destroy', 'TimetableController@destroyDaySubject')->name('day.subject.destroy');

    Route::resource('student_bills','StudentBillsController');

    Route::post('student_bills/create2','StudentBillsController@create2')->name('student_bills.create2');
    Route::post('payments/create2','PaymentController@create2')->name('payments.create2');
    // Route::post('student_bills/insert','StudentsBillController@insert_bill')->name('bill.store');
    // Route::resource('echeances', 'EcheanceController');
    Route::resource('payments', 'PaymentController');
    Route::get('payment/{payment_id}/lists', 'PaymentController@list')->name('payment.list'); 

    Route::get('parametres', 'HomeController@parametre'); 
    Route::get('eleves', 'HomeController@eleve'); 
    Route::get('matieres', 'HomeController@matiere'); 
    Route::get('paiements', 'HomeController@paiement'); 
    Route::get('getImages/{student}','StudentController@get_image')->name('get_image');
    Route::get('students_trashed','StudentController@trashed')->name('students.trashed');
    Route::get('students_trashed/{id}','StudentController@restoreShow')->name('students.restoreShow');
    Route::delete('students_restore/{student}','StudentController@restore')->name('students.restore');
    
    Route::resource('contacts', 'ContactController');

    Route::post('contacts/create2', 'ContactController@create2')->name('contacts.create2');
    Route::resource('families','FamilyController');
    Route::post('profil_update/{id}','UserController@profilUpdate')->name('profilupdate');
    // filtres  
    Route::post('recherche', 'ExpenseConfigurationController@filtres')->name('recherche.stor');
    Route::post('recherches', 'StudentController@filtres')->name('recherches.stor');


    Route::post('recherchefamille', 'FamilyController@filtrefamille')->name('recherchefamille.stor');
    Route::post('recherchecontact', 'ContactController@filtrecontact')->name('recherchecontact.stor');
});