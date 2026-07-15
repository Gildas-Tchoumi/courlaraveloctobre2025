<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index() {

    // recuperer les categories de la base de donnees
    $categories = Category::all();

    // tester si les categories sont recuperes
    // dd($categories);
    return view('Categories.listcat', compact('categories'));
    }

    // retourner le formulaire de creation d'une categorie
    public function create() {
        return view('Categories.create');
    }


    //insertion en base de donnees

    public function store(Request $request) {
    // dd($request->all());
        // dd($request);

        // valider les donnees du formulaire
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);


        // creer une nouvelle categorie

        // $category = new Category();
        // $category->name = $request->name;
        // $category->description = $request->description;
        // $category->save();

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Category::create($request->all());



        // rediriger vers la liste des categories
        return redirect()->route('list-category');

    }

    public function destroy($id) {
        // recuperer la categorie a supprimer
        $category = Category::find($id);

        // dd($category);

        // tester si la categorie existe
        if (!$category) {
            return redirect()->route('list-category')->with('error', 'Category not found');
        }

        // supprimer la categorie
        $category->delete();

        // rediriger vers la liste des categories
        return redirect()->route('list-category')->with('success', 'Category deleted successfully');
    }
}
