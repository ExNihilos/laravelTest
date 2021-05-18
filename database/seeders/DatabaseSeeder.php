<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $page=1;
         //\App\Models\User::factory(10)->create();
        //$content = file_get_contents('https://api.rawg.io/api/games?key=9167fc26de294c36bf13e920bff83f3e&page_size=40&page='.$page);
//        $data = json_decode($content);
//        $games=$data->results;
        for ($i=1; $i<10; $i++, $page++)
        {
            $content = file_get_contents('https://api.rawg.io/api/games?key=9167fc26de294c36bf13e920bff83f3e&page_size=40&page='.$page);
            $data = json_decode($content);
            $games = $data->results;
            foreach ($games as $game)
            {
                $content = file_get_contents( 'https://api.rawg.io/api/games/'.$game->slug.'?key=9167fc26de294c36bf13e920bff83f3e');
                $data2 = json_decode($content);

                Game::create([
                    'name' => $game->name,
                    'genre' => $game->genres[0]->name,
                    'poster' => $game->background_image,
                    'metacritic' => $game->metacritic,
                    'description' => $data2->description_raw??null,
                    'developer' => $data2->developers[0]->name??null,
                    'publisher' => $data2->publishers[0]->name??null,
                    'release_date' => $game->released,
                    'price' => rand(300, 2000)
                ]);
            }
        }
    }
}
