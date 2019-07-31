<?php

namespace App\Http\Controllers;

use App\Models\ExpenseConfiguration;
use Illuminate\Http\Request;
use Auth;
use App\Models\School;
use App\Models\AcademicYear;
use App\Models\StudyLevel;

class ExpenseConfigurationController extends Controller
{
    public function index()
    {
        if(Auth::user()->school_id == null) {
            $expense_configurations = ExpenseConfiguration::all();
            $academique =AcademicYear::where('is_active',1)->get();
            $niveaux =StudyLevel::all(); 
        } else {
            $expense_configurations = Auth::user()->school->expense_configurations;
            $academique =AcademicYear::where('school_id',Auth::user()->school->id)->where('is_active',1)->get();
            $niveaux =StudyLevel::where('school_id',Auth::user()->school->id)->get(); 
            // $datas =StudyLevel::where('school_id',Auth::user()->school->id)->get(); 
        }
        // dd($niveaux);
        return view('expense_configurations.index', compact('expense_configurations', 'academique', 'niveaux'));
    }

    public function create()
    {
        if(Auth::user()->school_id == null) {
            $expense_configurations = ExpenseConfiguration::all();
            $schools = School::all();
        } else {
            $expense_configurations = Auth::user()->school->expense_configurations;
            $schools = array(Auth::user()->school);
        }
        return view('expense_configurations.create',compact('expense_configurations', 'schools'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'school' => 'required|integer',
            "studylevel" => "required|integer",
            "academic_year" => "required|integer",
            "expense" => "required|integer",
            "amount" => "required|numeric",
            "echeance" => "nullable|date",
            "is_required" => "nullable|string"
        ]);

        $expense_configuration = new ExpenseConfiguration;
        $expense_configuration->school_id = $request->school;
        $expense_configuration->academic_year_id = $request->academic_year;
        $expense_configuration->expense_id = $request->expense;
        $expense_configuration->studylevel_id = $request->studylevel;
        $expense_configuration->expense_id = $request->expense;
        $expense_configuration->amount = $request->amount;
        $expense_configuration->echeance = $request->echeance;
        if(!empty(isset($request->is_required)) && ($request->is_required == "on") ||  ($request->is_required == "On")) {
            $expense_configuration->is_required = 1;
        } else {
            $expense_configuration->is_required = 0;
        }
        $expense_configuration->save();

        flash('Frais configuré avec succès.')->success();
        return redirect()->route('expense-configurations.index');
    }
   
    public function show(ExpenseConfiguration $expenseConfiguration)
    {
        //
    }

    public function edit(ExpenseConfiguration $expense_configuration)
    {
        if(Auth::user()->school_id == null) {
            $schools = School::all();
        } else {
            $schools = array(Auth::user()->school);
        }
        return view('expense_configurations.edit',compact('expense_configuration', 'schools'));
    }

    public function update(Request $request, ExpenseConfiguration $expense_configuration)
    {
        $this->validate($request,[
            "amount" => "required|numeric",
            "echeance" => "nullable|date",
            "is_required" => "nullable|string"
        ]);

        $expense_configuration->amount = $request->amount;
        $expense_configuration->echeance = $request->echeance;
        if(!empty(isset($request->is_required)) && ($request->is_required == "on") ||  ($request->is_required == "On")) {
            $expense_configuration->is_required = 1;
        } else {
            $expense_configuration->is_required = 0;
        }
        $expense_configuration->save();

        flash('Frais mis à jour.');
        return redirect()->route('expense-configurations.index');
    }

    public function destroy(ExpenseConfiguration $expense_configuration)
    {
        $expense_configuration->delete();
        flash('Frais supprimé.');
        return redirect()->route('expense-configurations.index');
    }

    public function filtres(Request $request)
    {  
        //   dd('vgdjjvbd');
        $this->validate($request,[
            'niveau' => 'required|integer',
            "annee" => "required|integer", 
            ]);
          

        $datas =ExpenseConfiguration::where('academic_year_id',$request->annee)->where('studylevel_id',$request->niveau)->get() ; 

        $expense_configurations = Auth::user()->school->expense_configurations;
        $academique =AcademicYear::where('school_id',Auth::user()->school->id)->where('is_active',1)->get();
        $niveaux =StudyLevel::where('school_id',Auth::user()->school->id)->get();
        return view('expense_configurations.recherche', compact('expense_configurations', 'academique', 'niveaux','datas'));
    }

}

