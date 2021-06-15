<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
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
            $content = file_get_contents('https://api.rawg.io/api/publishers?key=9167fc26de294c36bf13e920bff83f3e&page_size=40&page='.$page);
            $data = json_decode($content);
            $publishers = $data->results;
            foreach ($publishers as $publisher)
            {
                Publisher::create([
                    'name' => $publisher->name
                 ]);
            }
        }
    }
}
