<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    //

    public function index() {
        return view('Utilisateurs.liste');
    }

    public function create()
    {
        return view('Utilisateurs.create');
    }
}
