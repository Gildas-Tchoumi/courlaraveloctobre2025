<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
