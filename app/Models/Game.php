<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /** @use HasFactory<\Database\Factories\GameFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'published_date',
        'publisher'
    ];
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'game_genre');
    }

    public static function createGame($data) {
        $game = self::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'published_date' => $data['published_date'],
            'publisher' => $data['publisher']
        ]);

        // Attach genres to the game
        if (isset($data['genres'])) {
            $game->genres()->attach($data['genres']);
        }

        return $game;
    }

    public function updateGame($data) {
        $this->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'published_date' => $data['published_date'],
            'publisher' => $data['publisher']
        ]);

        // Sync genres to the game
        if (isset($data['genres'])) {
            $this->genres()->sync($data['genres']);
        } else {
            $this->genres()->sync([]); // Detach all genres if none are provided
        }
    }

    public function scopeWithGenres($query)
    {
        return $query->with(['genres' => function ($query) {
            $query->select('genres.id', 'genres.name');
        }]);
    }
}
    