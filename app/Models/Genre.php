<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /** @use HasFactory<\Database\Factories\GenreFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_genre');
    }

    public function getName()
    // replace spaces with dashes and make first letter uppercase
    {
        return ucwords(str_replace('_', ' ', $this->name));
    }

    public static function createGenre($data) {
        $genre = self::create([
            'name' => $data['name'],
            'description' => $data['description']
        ]);

        return $genre;
    }

    public function updateGenre($genre, $data) {
        $genre->update([
            'name' => $data['name'],
            'description' => $data['description']
        ]);

        return $genre;
    }
}

