<?php

namespace Database\Seeders;

use App\Models\Developer;
use Illuminate\Database\Seeder;

class DeveloperRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developers = Developer::all();

        foreach ($developers as $developer)
        {
            $rating = 0;
            $count = 0;

            if (count($developer->games)>0)
            {
                foreach ($developer->games as $game)
                {
                    if ($game->metacritic != null)
                    {
                        $count++;
                        $rating += $game->metacritic;
                    }
                }

                if ($count!=null)
                {
                    $rating /= $count;
                }

                else $rating=null;
            }

            else $rating=null;

            $developer->rating = round($rating,2);
            $developer->save();
        }
    }
}
