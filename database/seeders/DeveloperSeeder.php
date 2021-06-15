<?php

namespace Database\Seeders;

use App\Models\Developer;
use Dejurin\GoogleTranslateForFree;
use Illuminate\Database\Seeder;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page=1;

        for ($i=1; $i<=25; $i++, $page++)
        {
            $content = file_get_contents('https://api.rawg.io/api/developers?key=9167fc26de294c36bf13e920bff83f3e&page_size=40&page='.$page);
            $data = json_decode($content);
            $developers = $data->results;
            foreach ($developers as $developer)
            {
                Developer::create([
                    'name' => $developer->name
                ]);
            }
        }
    }
}
