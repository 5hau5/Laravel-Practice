<?php

use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');
    });
});

require __DIR__.'/auth.php';