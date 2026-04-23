<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    Route::get('/', function () {  
        return "Admin Dashboard";
    })->name('admin.dashboard');
});

