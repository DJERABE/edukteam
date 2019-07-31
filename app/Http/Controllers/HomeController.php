<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }
    public function parametre()
    { 
        return view('bouton_accueil.parametre');
    }
    public function paiement()
    { 
        return view('bouton_accueil.paiement');
    }
    public function eleve()
    { 
        return view('bouton_accueil.eleve');
    }
    public function matiere()
    { 
        return view('bouton_accueil.matiere');
    }
}
