<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\GenreController;

Route::middleware("auth")->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

      //Route::get('gamelist',  [GameListController::class, 'index'])->name('gamelist');

        Route::prefix('games')->group(function () {
            Route::get('/', [GameController::class, 'list'])->name('games.index');    // List games
            Route::get('create', [GameController::class, 'create'])->name('games.create');  // Show game creation form
            Route::post('/', [GameController::class, 'store'])->name('games.store');  // Store new game
            Route::get('{id}', [GameController::class, 'show'])->name('games.show');  // Show single game
            Route::get('{id}/edit', [GameController::class, 'edit'])->name('games.edit');  // Show game edit form
            Route::put('{id}', [GameController::class, 'update'])->name('games.update');  // Update game
            Route::delete('{id}', [GameController::class, 'destroy'])->name('games.destroy');  // Delete game
        });

        // routes/web.php

        

        Route::prefix('genres')->group(function () {
            Route::get('/', [GenreController::class, 'list'])->name('genres.index');  // List genres
            Route::get('/search', [GenreController::class, 'search'])->name('genres.search');
            Route::get('create', [GenreController::class, 'create'])->name('genres.create');  // Show genre creation form
            Route::post('/', [GenreController::class, 'store'])->name('genres.store');  // Store new genre
            Route::get('{id}', [GenreController::class, 'show'])->name('genres.show');  // Show single genre
            Route::get('{id}/edit', [GenreController::class, 'edit'])->name('genres.edit');  // Show genre edit form
            Route::put('{id}', [GenreController::class, 'update'])->name('genres.update');  // Update genre
            Route::delete('{id}', [GenreController::class, 'destroy'])->name('genres.destroy');  // Delete genre
        });

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});


require __DIR__.'/auth.php';