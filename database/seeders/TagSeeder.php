<?php

namespace Database\Seeders;

use App\Models\Tag;
use Dejurin\GoogleTranslateForFree;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
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

        for ($i=1; $i<=5; $i++, $page++)
        {
            $content = file_get_contents('https://api.rawg.io/api/tags?key=9167fc26de294c36bf13e920bff83f3e&page_size=40&page='.$page);
            $data = json_decode($content);
            $tags = $data->results;
            foreach ($tags as $tag)
            {
//                $content = file_get_contents( 'https://api.rawg.io/api/games/'.$game->slug.'?key=9167fc26de294c36bf13e920bff83f3e');
//                $data2 = json_decode($content);

//                  $text = $tag->name??null;
//                  $translate = new GoogleTranslateForFree();
//                  $result = $translate->translate($source, $target, $text, $attempts);

                Tag::create([
                    'name' => $tag->name,
                ]);
            }
        }
    }
}
