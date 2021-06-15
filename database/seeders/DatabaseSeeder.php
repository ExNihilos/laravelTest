<?php

namespace Database\Seeders;

use App\Models\Developer;
use App\Models\Game;
use App\Models\Publisher;
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
        $this->call([
            UserSeeder::class,
            PublisherSeeder::class,
            DeveloperSeeder::class,
            GameSeeder::class,
            TagSeeder::class,
            GameTag_Seeder::class
        ]);


//        for ($i=1; $i<10; $i++, $page++)
//        {
//            $content = file_get_contents('https://api.rawg.io/api/games?key=9167fc26de294c36bf13e920bff83f3e&page_size=40&page='.$page);
//            $data = json_decode($content);
//            $games = $data->results;
//            foreach ($games as $game)
//            {
//                $content = file_get_contents( 'https://api.rawg.io/api/games/'.$game->slug.'?key=9167fc26de294c36bf13e920bff83f3e');
//                $data2 = json_decode($content);
//
//                $all = Game::all();
//                $all->update([
//                    'genres' => $game->genres
//                ]);
//            }
//        }
    }
}
