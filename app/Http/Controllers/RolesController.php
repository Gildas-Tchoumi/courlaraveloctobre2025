<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolesController extends Controller
{
    //
    public function index()
    {
        return view('Roles.liste');
    }

    public function create()
    {
        return view('Roles.create');
    }

    public function viewasign()
    {
        return view('Roles.roleasign');
    }
}
