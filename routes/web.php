<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('table/basic-table', function(){
    return view('partial.basic-table');
})->name('basic-table');

Route::get('charts/charjs', function(){
    return view('partial.chartjs');
})->name('chartjs');

Route::get('forms/basic_elements', function(){
    return view('partial.basic_elements');
})->name('basic_elements');

Route::get('basic_ui/buttons', function(){
    return view('partial.buttons');
})->name('buttons');

Route::get('basic_ui/dropdown', function(){
    return view('partial.dropdowns');
})->name('dropdown');

Route::get('basic_ui/typography',function(){
    return view('partial.typography');
})->name('typography');

// Route::get('category_table', function(){
//     return view('partial.category');
// })->name('category_table');

// Route::get('post_table', function(){
//     return view('partial.post');
// })->name('post_table');

Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');

Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post/store', [PostController::class, 'store'])->name('post.store');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

require __DIR__.'/auth.php';
