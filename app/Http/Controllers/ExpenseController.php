<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Expense;
use Illuminate\Http\Request;
use App\Models\School;
class ExpenseController extends Controller
{
    public function index()
    {
        if(Auth::user()->school_id == null) {
            $expenses = Expense::all();
        } else {
            $expenses = Auth::user()->school->expenses;
        }
        return view('expenses.index', compact('expenses'));
    }

    public function create()
    {
        if(Auth::user()->school_id == null) {
            $schools = School::all();
        } else {
            $schools = array(Auth::user()->school);
        }
        return view('expenses.create',compact('schools'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'school' => 'required|integer'
        ]);

        $expense = Expense::create([
            'name' => $request->name,
            'school_id'=>$request->school
        ]);

        flash('Frais enregistré avec succès.')->success();
        return redirect()->route('expenses.index');
    }

    public function show(Expense $expense)
    {
        return redirect()->back();
    }

    public function edit(Expense $expense)
    {
        if(Auth::user()->school_id == null) {
            $schools = School::all();
        } else {
            $schools = array(Auth::user()->school);
        }
        return view('expenses.edit',compact('expense','schools'));
    }

    public function update(Request $request, Expense $expense)
    {
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'school' => 'required|integer'
        ]);

        $expense->update([
            'name' => $request->name,
            'school_id'=>$request->school
        ]);

        flash('Frais mis à jour.');
        return redirect()->route('expenses.index');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        flash('Frais supprimé !');
        return redirect()->route('expenses.index');
    }
}
