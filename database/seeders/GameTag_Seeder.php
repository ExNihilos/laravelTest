<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Tag;
use Dejurin\GoogleTranslateForFree;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GameTag_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $games = Game::all();
        foreach ($games as $game)
        {
            $slug = Str::slug($game->name);
            $content = @file_get_contents("https://api.rawg.io/api/games/$slug?key=9167fc26de294c36bf13e920bff83f3e"?? null);
            $data = json_decode($content);
            foreach ($data->tags??[] as $tag)
            {
                $isTagFind=Tag::where('name', $tag->name)->first();
                if($isTagFind)
                {
                    $game->tags()->attach($isTagFind->id);
                }
            }
        }
    }
}
