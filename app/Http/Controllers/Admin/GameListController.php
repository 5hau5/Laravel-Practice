<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Game;

class GameListController extends Controller{

    public function index(Request $request) {   
        //

        // $games_ls = [
        //     [
        //         'id' => 1,
        //         'name' => 'Game 1',
        //         'description' => 'Description of Game 1',
        //         'published_date' => '2024-01-01',
        //         'publisher' => 'Publisher 1',
        //     ],
        //     [
        //         'id' => 2,
        //         'name' => 'Game 2',
        //         'description' => 'Description of Game 2',
        //         'published_date' => '2024-02-01',
        //         'publisher' => 'Publisher 2',
        //     ],
        //      [
        //         'id' => 3,
        //         'name' => 'Game 3',
        //         'description' => 'Description of Game 3',
        //         'published_date' => '2024-03-01',
        //         'publisher' => 'Publisher 3',
        //     ],
        //     [
        //         'id' => 4,
        //         'name' => 'Game 4',
        //         'description' => 'Description of Game 4',
        //         'published_date' => '2024-04-01',
        //         'publisher' => 'Publisher 4',
        //     ],
        //      [
        //         'id' => 5,
        //         'name' => 'Game 5',
        //         'description' => 'Description of Game 5',
        //         'published_date' => '2024-05-01',
        //         'publisher' => 'Publisher 5',
        //     ],

        // ];

        $games = Game::with('genres')->orderBy("created_at","desc")->paginate(3);
        //dd($games);

        return view('admin.gamelist', compact('games'));
    }
}