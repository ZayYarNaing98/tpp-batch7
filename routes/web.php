<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

// Static Route
Route::get('/blogs', function(){
    return "This is Blog.";
});

// Dynamic Route
Route::get('/blogs/{id}', function($id){
    return "This is Blog Details - $id";
});

// // Naming Route
// Route::get('/dashboard', function(){
//     return "Welcome TPP";
// })->name('dashboard.tpp');

// Route::get('/tpp', function(){
//     return redirect()->route('dashboard.tpp');
// });

// Group Route
Route::prefix('/dashboard')->group(function(){
    Route::get('/admin', function(){
        return "This is Admin Dashboard";
    });

    Route::get('/user', function(){
        return "This is User Dashabord";
    })->name('user');

    Route::get('/tpp', function(){
        return redirect()->route('user');
    });
});

// Route::get('/categories', function(){
//     return view('categories.index');
// });

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');

Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');

Route::post('/categores/{id}', [CategoryController::class, 'delete'])->name('categories.delete');