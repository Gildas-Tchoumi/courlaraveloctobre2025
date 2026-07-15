<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('Home.home');
});
Route::get('list-category', [CategoryController::class, 'index'])->name('list-category');
Route::get('create-category', [CategoryController::class, 'create'])->name('create-category');
Route::post('store-category', [CategoryController::class, 'store'])->name('store-category');
Route::get('destroy-category/{id}', [CategoryController::class, 'destroy'])->name('destroy-category');