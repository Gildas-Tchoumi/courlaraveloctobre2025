<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    //
    public function index()
    {
        $roles = Role::all();
        return view('Roles.liste', compact('roles'));
    }

    public function create()
    {
        return view('Roles.create');
    }

    public function store(Request $request)
    {

        // valider les donnees du formulaire
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);


        Role::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Role::create($request->all());



        // rediriger vers la liste des roles
        return redirect()->route('list-roles');
    }

    public function viewasign($id)
    {
        $utilisateur = Utilisateur::find($id);

        $roles = Role::all();
        return view('Roles.roleasign', compact('utilisateur', 'roles'));
    }

    public function asign(Request $request, $id)
    {
        $utilisateur = Utilisateur::find($id);

        // Récupérer les rôles sélectionnés depuis le formulaire
        $selectedRoles = $request->input('role_id', []);

        // Synchroniser les rôles de l'utilisateur avec les rôles sélectionnés
        $utilisateur->roles()->attach($selectedRoles);

        // Rediriger vers la liste des utilisateurs ou une autre page appropriée
        return redirect()->route('list-utilisateur')->with('success', 'Rôles assignés avec succès.');
    }
}
