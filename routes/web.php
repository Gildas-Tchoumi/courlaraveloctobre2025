<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;





Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('Home.home');
});

//Routes pour les categories

Route::get('list-category', [CategoryController::class, 'index'])->name('list-category');
Route::get('create-category', [CategoryController::class, 'create'])->name('create-category');
Route::post('store-category', [CategoryController::class, 'store'])->name('store-category');
Route::get('destroy-category/{id}', [CategoryController::class, 'destroy'])->name('destroy-category');
Route::get('edit-category/{id}', [CategoryController::class, 'edit'])->name('edit-category');
Route::post('update-category/{id}', [CategoryController::class, 'update'])->name('update-category');

//Routes pour les produits
Route::get('list-product', [ProductController::class, 'index'])->name('list-product');
Route::get('create-product', [ProductController::class, 'create'])->name('create-product');
Route::post('store-product', [ProductController::class, 'store'])->name('store-product');


//Routes pour les utilisateurs
Route::get('list-utilisateur', [UtilisateurController::class, 'index'])->name('list-utilisateur');
Route::get('create-utilisateur', [UtilisateurController::class, 'create'])->name('create-utilisateur');
Route::post('store-utilisateur', [UtilisateurController::class, 'store'])->name('store-utilisateur');

//Routes pour les roles
Route::get('list-roles', [RolesController::class, 'index'])->name('list-roles');
Route::get('create-roles', [RolesController::class, 'create'])->name('create-roles');
Route::post('store-roles', [RolesController::class, 'store'])->name('store-roles');
Route::get('asign-roles/{id}', [RolesController::class, 'viewasign'])->name('asign-roles');
Route::post('asign-roles/{id}', [RolesController::class, 'asign'])->name('asign-role');