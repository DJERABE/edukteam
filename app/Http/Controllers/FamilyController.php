<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Familly;
use App\Models\Contact;
use App\Models\Student;
use App\Models\Classe;
use Auth;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idr= Auth::user()->school_id ;
        $families = Familly::where('school_id',$idr)->paginate(20);
        // dd($families);
        return view('families.index',compact('families'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('families.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idr= Auth::user()->school_id ;
        $this->validate($request,[
            'name' => 'required',
            'code_family'=>'required'
        ]);

        Familly::create([
            
            'name' => $request->name,
            'code_family'=>$request->code_family,
            'school_id'=>$idr
            
            ]);

            flash('Famille ajoutee avec succes !')->success();

            return redirect()->route('families.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Familly $family)
    {
        $idr= Auth::user()->school_id ;
        $parents = Contact::where('school_id',$idr)->where('family_id',$family->id)->get();
        $students = Student::where('school_id',$idr)->where('familly_id',$family->id)->get();
    //    dd($students);
        return view('families.show',compact('family','parents','students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Familly $family)
    {

        return view('families.edit',compact('family'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Familly $family)
    {
        $idr= Auth::user()->school_id ;
        $this->validate($request,[
            'name' => 'required',
            'code_family'=>'required'
        ]);

        $family->update([
            
            'name' => $request->name,
            'code_family'=>$request->code_family,
            'school_id'=>$idr
            
            ]);

            flash('Famille modifie avec succes !')->success();

            return redirect()->route('families.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filtrefamille(Request $request)
    {  
        $this->validate($request,[
            'name' => 'required', 
        ]);
 
        $idr= Auth::user()->school_id ; 
        $datas =Familly::where('school_id',$idr)->where('name','LIKE', '%'.$request->name.'%')->get() ;  
       
        return view('families.recherchefamille', compact('datas'));
    }
}
