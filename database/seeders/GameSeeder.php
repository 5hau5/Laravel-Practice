<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\Genre;
use App\Models\Publisher;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * a game can have multiple genres, so we will create some genres and then attach them to the games.
     * a game can have only one publisher
     */
    public function run(): void
    {
        $genres = Genre::factory(5)->create();
        $publishers = Publisher::factory(5)->create();

        Game::factory(20)->create()->each(function ($game) use ($genres, $publishers) {
            $game->genres()->attach(
                $genres->random(rand(1, 3))->pluck('id')->toArray()
            );
            $game->publisher_id = $publishers->random()->id;
            $game->save();
        });
    }
}
