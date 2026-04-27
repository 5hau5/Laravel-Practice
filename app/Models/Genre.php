<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /** @use HasFactory<\Database\Factories\GenreFactory> */
    use HasFactory;

    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_genre');
    }

    public function getName()
    // replace spaces with dashes and make first letter uppercase
    {
        return ucwords(str_replace('_', ' ', $this->name));
    }
}
