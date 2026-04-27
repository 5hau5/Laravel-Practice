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
        return view('admin.games.list', compact('games'));
    }

    public function create(Request $request) {
        $genres = Genre::all();
        return view('admin.games.create', compact('genres'));
    }

    public function edit(Request $request, $id) {
        $game = Game::withGenres()->findOrFail($id);
        $genres = Genre::all();
        return view('admin.games.edit', compact('game', 'genres'));
    }  

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'published_date' => 'required|date',
            'publisher' => 'required|string|max:255',
            'genres' => 'array'
        ]);

        Game::createGame($data);

        return redirect()->route('games.index')->with('success', 'Game created successfully.');
    }

    public function show(Request $request, $id) {
        $game = Game::withGenres()->findOrFail($id);
        return view('admin.games.show', compact('game'));
    }

    public function update(Request $request, $id) {
        $game = Game::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'published_date' => 'required|date',
            'publisher' => 'required|string|max:255',
            'genres' => 'array'
        ]);
        $game->updateGame($data);

        return redirect()->route('games.index')->with('success', 'Game updated successfully.');
    }

    public function destroy(Request $request, $id) {
        $game = Game::findOrFail($id);
        $game->delete();

        return redirect()->route('games.index')->with('success', 'Game deleted successfully.');
    }
}
