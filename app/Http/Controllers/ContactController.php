<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\GuardianType;
use \App\Models\Student;
use Auth;
use App\Models\Familly;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idr= Auth::user()->school_id ;
        // $contacts = Contact::paginate(20);  

        $contacts = Contact::where('school_id',$idr)->paginate(20);  
        // dd($contacts);
        return view('contacts.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idr= Auth::user()->school_id ;
        $families = Familly::where('school_id',$idr)->get();  
        $types = GuardianType::all();
        return view ('contacts.create',compact('types','families'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request){

        $idr= Auth::user()->school_id ;
        $this->validate($request,[

            "guardian_type" => "required|integer",
            "last_name" => "required|string|max:191",
            "given_names" => "required|string|max:191",
            "career" => "required|string|max:191",
            "tel_home" => "required|string|max:191",
            "cell" =>"required|string|max:191",
            "email" => "required|string|max:191|unique:contacts",
            "address" => "required|string|max:191",
            "family*"=>'nullable'
            //"is_contact" => "required"
        ]);

        if(!empty($request->is_contact) && isset($request->is_contact) && (($request->is_contact == "on") ||  ($request->is_contact == "On"))) {
            $a_contacter = 1;
        } else {
            $a_contacter  = 0;
        }

        $contact = new Contact;

        $contact->guardian_type_id = $request->guardian_type;
        $contact->last_name = $request->last_name;
        $contact->given_names = $request->given_names;
        $contact->career = $request->career;
        $contact->tel_home = $request->tel_home;
        $contact->cell = $request->cell;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->is_contact = $a_contacter;
        $contact->family_id = $request->family;
        $contact->school_id = $idr;
        $contact->save();

        return redirect()->route('contacts.index');

     }




    public function create2(Request $request)
    {
        $this->validate($request,[

            "guardian_type" => "required|integer",
            "last_name" => "required|string|max:191",
            "given_names" => "required|string|max:191",
            "career" => "required|string|max:191",
            "tel_home" => "required|string|max:191",
            "cell" =>"required|string|max:191",
            "email" => "required|string|max:191|unique:contacts",
            "address" => "required|string|max:191",
            //"is_contact" => "required"
        ]);

        if(!empty($request->is_contact) && isset($request->is_contact) && (($request->is_contact == "on") ||  ($request->is_contact == "On"))) {
            $a_contacter = 1;
        } else {
            $a_contacter  = 0;
        }


            $guardian_type = $request->guardian_type;
            $last_name = $request->last_name;
            $given_names = $request->given_names;
            $career = $request->career;
            $tel_home = $request->tel_home;
            $cell = $request->cell;
            $email = $request->email;
            $address = $request->address;
            $is_contact = $a_contacter;


        // $contact = Contact::create([
        //     "guardian_type_id" => $request->guardian_type,
        //     "last_name" => $request->last_name,
        //     "given_names" => $request->given_names,
        //     "career" => $request->career,                        
        //     "tel_home" => $request->tel_home,
        //     "cell" => $request->cell,
        //     "email" => $request->email,
        //     "address" => $request->address,
        //     "is_contact"=>$a_contacter
        // ]);

        

        //flash('contact ajoutee avec success !')->success();
        return view('contacts.create2',compact());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        // dd('hvdvgvc');
        $idr= Auth::user()->school_id ;
        $families = Familly::where('school_id',$idr)->paginate(20);
        $types = GuardianType::all();
        return view('contacts.edit',compact('contact','types','families'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Contact $contact)
    public function update(Request $request, $id)
    {
// 
        $idr= Auth::user()->school_id ;

        // $this->validate($request,[

        //     "guardian_type" => "required|integer",
        //     "last_name" => "required|string|max:191",
        //     "given_names" => "required|string|max:191",
        //     "career" => "required|string|max:191",
        //     "tel_home" => "required|string|max:191",
        //     "cell" =>"required|string|max:191",
        //     "email" => "required|string|max:191|unique:contacts",
        //     "address" => "required|string|max:191",
        //     "family"=>'nullable' 
        // ]);

        if(!empty($request->is_contact) && isset($request->is_contact) && (($request->is_contact == "on") ||  ($request->is_contact == "On"))) {
            $a_contacter = 1;
        } else {
            $a_contacter  = 0;
        }

        $contact =  Contact::findOrFail($id);
        $contact->guardian_type_id = $request->guardian_type;
        $contact->last_name = $request->last_name;
        $contact->given_names = $request->given_names;
        $contact->career = $request->career;
        $contact->tel_home = $request->tel_home;
        $contact->cell = $request->cell;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->is_contact = $a_contacter;
        $contact->family_id = $request->family;
        $contact->school_id = $idr;
        $contact->save();
        // dd($contact->id);
        
        flash('Classe modifiée avec succès !')->success();
        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        
    }

    public function filtrecontact(Request $request)
        {  
            $this->validate($request,[
                'name' => 'required', 
            ]);
            $idr= Auth::user()->school_id ; 
            $datas =Contact::where('school_id',$idr)->where('last_name','LIKE', '%'.$request->name.'%')->get() ; 
    // dd($datas);
       
            return view('contacts.recherchecontact', compact('datas'));
        }
}
