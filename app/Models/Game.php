<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /** @use HasFactory<\Database\Factories\GameFactory> */
    use HasFactory;
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'game_genre');
    }

    function createGame($data) {
        $game = new Game();
        $game->name = $data['name'];
        $game->description = $data['description'];
        $game->published_date = $data['published_date'];
        $game->publisher = $data['publisher'];
        $game->save();

        // Attach genres to the game
        if (isset($data['genres'])) {
            $game->genres()->attach($data['genres']);
        }

        return $game;
    }

    public function scopeWithGenres($query)
    {
        return $query->with(['genres' => function ($query) {
            $query->select('genres.id', 'genres.name');
        }]);
    }
}
    