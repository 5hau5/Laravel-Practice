<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\GameListController;  
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\GenreController;

Route::middleware("auth")->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

      //Route::get('gamelist',  [GameListController::class, 'index'])->name('gamelist');

        Route::prefix('game') ->group(function () {
            Route::get('list', [GameController::class,  'list'])->name('gamelist');
            Route::get('{id}', [GameController::class, 'show'])->name('game.show');
            Route::get('{id}/update', [GameController::class, 'edit'])->name('game.edit');
            Route::post('{id}/update', [GameController::class, 'update'])->name('game.update');
            Route::delete('{id}/delete', [GameController::class, 'destroy'])->name('game.delete');
        });
        Route::prefix('genres')->group(function () {
            Route::get('', [GenreController::class, 'index'])->name('genres');
            Route::get('{id}', [GenreController::class, 'show'])->name('genre.show');
            Route::get('{id}/update', [GenreController::class, 'edit'])->name('genre.edit');
            Route::post('{id}/update', [GenreController::class, 'update'])->name('genre.update');
            Route::delete('{id}/delete', [GenreController::class, 'destroy'])->name('genre.delete');
        });

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});


require __DIR__.'/auth.php';