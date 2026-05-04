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
    ];
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'game_genre');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public static function createGame($data) {
        $game = self::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'published_date' => $data['published_date'],
        ]);

        //attach publisher to the game
        if (isset($data['publisher'])) {
            $publisher = Publisher::find($data['publisher']);
            if ($publisher) {
                $game->publisher()->associate($publisher);
                $game->save();
            }
        }

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
        ]);

        // Update publisher association
        if (isset($data['publisher'])) {
            $publisher = Publisher::find($data['publisher']);
            if ($publisher) {
                $this->publisher()->associate($publisher);
                $this->save();
            }
        } else {
            $this->publisher()->dissociate();
            $this->save();
        }

        // Sync genres to the game
        if (isset($data['genres'])) {
            $this->genres()->sync($data['genres']);
        } else {
            $this->genres()->sync([]); // Detach all genres if none are provided
        }
    }

    public function scopeWithGenresAndPublisher($query)
    {
        return $query->with(['genres' => function ($query) {
            $query->select('genres.id', 'genres.name');
        }, 'publisher' => function ($query) {
            $query->select('publishers.id', 'publishers.name');
        }]);
    }
}
    