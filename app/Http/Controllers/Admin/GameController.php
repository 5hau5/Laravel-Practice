<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Genre;
class GameController extends Controller
{
    public function list(Request $request) {   

        
        $games = Game::withGenres()->paginate(5);
        
        $games->getCollection()->transform(function ($game) {
            // Transform the genres to only contain the names (no pivot data)
            $game->genres = $game->genres->map(function ($genre) {
                return $genre->getName();
            }); 
            return $game;
        });
        return view('admin.gamelist', compact('games'));
    }
}
