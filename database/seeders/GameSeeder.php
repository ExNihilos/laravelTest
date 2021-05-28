<?php

namespace Database\Seeders;

use App\Models\Game;
use Dejurin\GoogleTranslateForFree;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $source = 'en';
        $target = 'ru';
        $attempts = 3;

        $page=1;

        for ($i=1; $i<10; $i++, $page++)
        {
            $content = file_get_contents('https://api.rawg.io/api/games?key=9167fc26de294c36bf13e920bff83f3e&page_size=40&page='.$page);
            $data = json_decode($content);
            $games = $data->results;
            foreach ($games as $game)
            {
                $content = file_get_contents( 'https://api.rawg.io/api/games/'.$game->slug.'?key=9167fc26de294c36bf13e920bff83f3e');
                $data2 = json_decode($content);
                $text = $data2->description_raw??null;
                $translate = new GoogleTranslateForFree();
                $result = $translate->translate($source, $target, $text, $attempts);

                Game::create([
                    'name' => $game->name,
                    'genre' => $game->genres[0]->name,
                    'poster' => $game->background_image,
                    'metacritic' => $game->metacritic,
                    'description' => $result,
                    'developer' => $data2->developers[0]->name??null,
                    'publisher' => $data2->publishers[0]->name??null,
                    'release_date' => $game->released,
                    'price' => rand(300, 2000),
                    'genres' => json_encode($game->genres[0])
                ]);
            }
        }
    }
}
