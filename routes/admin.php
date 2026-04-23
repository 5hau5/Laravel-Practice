<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\GameListController;

Route::middleware("auth")->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        Route::get('gamelist',  [GameListController::class, 'index'])->name('gamelist');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});


require __DIR__.'/auth.php';