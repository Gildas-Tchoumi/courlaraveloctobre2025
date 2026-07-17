<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    //
    public function index() {
        //recuperer les produits de la base de donnees
        $products = Product::all();
        return view('Products.listprod', compact('products'));
    }

    public function create() {

    $cat = Category::all();
        return view('Products.createprod', compact('cat'));
    }

    //insertion en base de donnees
    public function store(Request $request) {

        // valider les donnees du formulaire

        $request->validate([
            'name' => 'required',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|integer|min:0',
            'quantity' => 'required|integer|min:0',
            'description' => 'nullable',
            'category_id' => 'required|exists:categories,id',
        ]);

        // generer le code de facon aleatoire
        $code = Str::random(8);

        // creer un nouveau produit
        $product = new Product();
        $product->code = $code;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('list-product');
    }
}
