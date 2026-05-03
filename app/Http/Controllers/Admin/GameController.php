<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Genre;

use Devrabiul\ToastMagic\Facades\ToastMagic;
class GameController extends Controller
{
        public function list(Request $request) {  
            $request->validate([
                'search' => 'nullable|string|max:255'
            ]);

            if ($request->has('search')) {
                $search = $request->input('search');
                $games = Game::withGenres()
                    ->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('publisher', 'like', '%' . $search . '%')
                    ->paginate(5);
            } else {
                $games = Game::withGenres()->paginate(5);
            }
            
            $games->getCollection()->transform(function ($game) {
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

        ToastMagic::success('Game '. $data['name'] . ' created successfully.');

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

        ToastMagic::success('Game ' . $game->name . ' updated successfully.');

        return redirect()->route('games.index')->with('success', 'Game updated successfully.');
    }

    public function destroy(Request $request, $id) {
        $request->validate([
            'id' => 'required|integer|exists:games,id'
        ]);

        $game = Game::findOrFail($id);
        $game_name = $game->name;
        $game->delete();

        ToastMagic::success('Game ' . $game_name . ' deleted successfully.');

        return redirect()->route('games.index')->with('success', 'Game deleted successfully.');
    }
}
