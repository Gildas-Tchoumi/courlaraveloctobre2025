<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    //

    public function index() {
        $utilisateurs = Utilisateur::all();
        return view('Utilisateurs.liste', compact('utilisateurs'));
    }

    public function create()
    {
        return view('Utilisateurs.create');
    }

    public function store(Request $request)
    {
        // valider les donnees du formulaire
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'sexe' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        // creer un nouvel utilisateur
        $utilisateur = new Utilisateur();
        $utilisateur->firstname = $request->firstname;
        $utilisateur->lastname = $request->lastname;
        $utilisateur->sexe = $request->sexe;
        $utilisateur->email = $request->email;
        $utilisateur->password = bcrypt($request->password);
        $utilisateur->save();

        // rediriger vers la liste des utilisateurs
        return redirect()->route('list-utilisateur');
    }
}
