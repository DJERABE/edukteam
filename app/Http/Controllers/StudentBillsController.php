<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseConfiguration;
use App\Models\Classe;
use App\Models\StudentBill;
use Auth;
use Session;
use App\Models\School;
use App\Models\AcademicYear;
use App\Models\Student;

class StudentBillsController extends Controller
{
    public function index()
    {
        
        if(Auth::user()->school_id == null) { 
            $student_bills = StudentBill::all(); 
        } else { 
            $student_bills = StudentBill::where('school_id', Auth::user()->school_id)->where('revoked', 0)->get();
            // dd($student_bills);
        }
        return view('student_bills.index', compact('student_bills'));
        
    }

    public function insert_bill(Request $request) {            
        // dd($request->all()); 
            $this->validate($request,[ 
                'quantite'=>'required',
                'remise'=>'required',
                'attendu'=>'required'               
            ]);
            
            $student_id = Session::get('student');
            $student_bill = new StudentBill;
            for($i=0 ; $i<count($request->expense_configuration_id);$i++){ 
                    $student_bill->quantite          = $request->quantite[$i];
                    $student_bill->remise            = $request->remise[$i];
                    $student_bill->attendu           = $request->attendu[$i];
                    $student_bill->unitaire          = $request->unitaire[$i];
                    $student_bill->solde             = $request->solde[$i];
                    $student_bill->montant           = $request->montant[$i];
                    $student_bill->expense_config_id = $request->expense_configuration_id[$i];
                    $student_bill->student_id        = $student_id;

                    $student_bill->solde = $student_bill->montant*(1-$student_bill->remise/100)-$student_bill->attendu;
                    $student_bill->save();
            }
            //flash('Facture enregistre avec success')->info();
            return redirect()->route('student_bills.show', $student_id);
    }

    public function create()
    {
        if(Auth::user()->school_id == null) {
        $schools = School::all();
            
        } else {
            $schools = array(School::findOrFail(Auth::user()->school_id));
        }
        return view('student_bills.create', compact('schools'));
    }

    public function create2(Request $request)
    {
        $this->validate($request, [
            'school' => 'required|integer',
            'academic_year' => 'required|integer',
            'classe' => 'required|integer',
            'student' => 'required|integer'
        ]);

        $school = School::findOrFail($request->school);
        $academic_year = AcademicYear::findOrFail($request->academic_year);
        $classe = Classe::findOrFail($request->classe);
        $study_level = $classe->study_level;
        $student = Student::findOrFail($request->student);
        $expense_configurations = ExpenseConfiguration::where('studylevel_id', $study_level->id)->get();
        // $tt =StudentBill::where('student_id',$request->student)->get();
        //     dd($tt);

        return view('student_bills.create2', compact('school', 'academic_year', 'classe', 'study_level', 'student', 'expense_configurations'));
    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'school' => 'required|integer',
            'academic_year' => 'required|integer',
            'classe' => 'required|integer',
            'student' => 'required|integer',
            'article.*' => 'required|integer',
            'quantite.*' => 'required|integer',
            'unitaire.*' => 'required|numeric',
            'remise.*' => 'required|numeric'
            ]);
            // dd($request->quantite); 
        $student_bill = new StudentBill;
        $student_bill->ref = uniqid();
        $student_bill->school_id = $request->school;
        $student_bill->classe_id = $request->classe;
        $student_bill->academic_year_id = $request->academic_year;
        $student_bill->student_id = $request->student;
        $student_bill->montant_total_attendu = 0;
        $student_bill->montant_total_paye = 0;
        $student_bill->montant_total_restant = 0;
        $student_bill->save();
        $montant_total_attendu = 0;

        for($i = 0; $i < count($request->article); $i++)
        {
            $montant_attendu = $this->get_montant_attendu($request->unitaire[$i], $request->quantite[$i], $request->remise[$i]);
            $montant_total_attendu += $montant_attendu;

            $student_bill->expense_configurations()->attach($request->article[$i], [
                'unitaire' => $request->unitaire[$i],
                'quantite' => $request->quantite[$i],
                'remise' => $request->remise[$i],
                'montant_attendu' => $montant_attendu,
                'montant_paye' => 0,
                'montant_restant' => $montant_attendu
            ]);
        }

        $student_bill->montant_total_attendu = $montant_total_attendu;
        $student_bill->montant_total_restant = $montant_total_attendu;
        $student_bill->save();

        flash('Facture enregistrée avec succès !')->success();
        return redirect()->route('student_bills.index');
    }

    public function show($id)
    {
        $student_bill = StudentBill::findOrFail($id);
        return view('student_bills.show', compact('student_bill'));
    }

    public function edit(StudentBill $student_bill)
    {
        return view('student_bills.edit', compact('student_bill'));
    }

    public function update(Request $request, StudentBill $student_bill)
    {
        $this->validate($request, [
            'school' => 'required|integer',
            'academic_year' => 'required|integer',
            'classe' => 'required|integer',
            'student' => 'required|integer',
            'article.*' => 'required|integer',
            'quantite.*' => 'required|integer',
            'unitaire.*' => 'required|numeric',
            'remise.*' => 'required|numeric',
            'montant_attendu.*' => 'required|numeric'
        ]);
        
        $montant_total_attendu = 0;
        for($i = 0; $i < count($request->montant_attendu); $i++) {
            $montant_total_attendu += $request->montant_attendu[$i];
        }

        $student_bill->school_id = $request->school;
        $student_bill->classe_id = $request->classe;
        $student_bill->academic_year_id = $request->academic_year;
        $student_bill->student_id = $request->student;
        $student_bill->montant_total_attendu = $montant_total_attendu;
        $student_bill->montant_total_paye = 0;
        $student_bill->montant_total_restant = $montant_total_attendu;
        $student_bill->save();

        $student_bill->expense_configurations()->detach();
        
        $montant_total_attendu = 0;

        for($i = 0; $i < count($request->article); $i++)
        {
            
            $montant_attendu = $this->get_montant_attendu($request->unitaire[$i], $request->quantite[$i], $request->remise[$i]);
            $montant_total_attendu += $montant_attendu;

            $student_bill->expense_configurations()->attach($request->article[$i], [
                'unitaire' => $request->unitaire[$i],
                'quantite' => $request->quantite[$i],
                'remise' => $request->remise[$i],
                'montant_attendu' => $montant_attendu,
                'montant_paye' => 0,
                'montant_restant' => $montant_attendu
            ]);
        }

        $student_bill->montant_total_attendu = $montant_total_attendu;
        $student_bill->montant_total_restant = $montant_total_attendu;
        $student_bill->save();

        flash('Facture modifiée !')->warning();
        return redirect()->route('student_bills.index');
    }

    private function get_montant_attendu($unitaire, $quantite, $remise_pourcentage) {
        $prix = $unitaire * $quantite;
        $remise = ( $remise_pourcentage * $prix ) / 100;
        $montant_attendu = $prix - $remise;
        return $montant_attendu;
    }

    public function destroy(StudentBill $student_bill)
    {
        $student_bill->revoked = 1;
        $student_bill->save();

        flash('Facture désactivé !');
        return redirect()->route('student_bills.index');
    }
}
