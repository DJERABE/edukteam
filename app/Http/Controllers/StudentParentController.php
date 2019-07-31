<?php

namespace App\Http\Controllers;

use App\StudentParent;
use Illuminate\Http\Request;

class StudentParentController extends Controller
{
    public function index()
    {
        $parents = StudentParent::all();
        return view('students.index', compact('parents'));
    }

    public function create()
    {
        return view('students.index', compact('parents'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
