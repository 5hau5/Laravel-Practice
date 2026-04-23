<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TheShausController;

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

Route::view('/test2', 'test2');

Route::get('/test', [TestController::class, 'test']);

Route::get('posts', [PostsController::class, 'index'])->name('posts.index');
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/shaus', [TheShausController::class, 'shausing'])->name('shaus.shausing');

require __DIR__.'/auth.php';

require __DIR__.'/admin.php';
