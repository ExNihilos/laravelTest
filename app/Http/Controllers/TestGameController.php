<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Tag;
use App\Models\User;
use Dejurin\GoogleTranslateForFree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class TestGameController extends Controller
{
    public function friends()
    {
        $user = User::find(11);

        dd($user->friends);
    }

    public function baseAuth()
    {
        session()->regenerate();
        return Auth::user();
    }

    public function testLogin()
    {
        $user = User::where('name', 'user1')->first();
        Auth::login($user);
        return redirect('/');
    }

    public function testTranslate()
    {
        $source = 'pl';
        $target = 'ru';
        $attempts = 5;
        $text = "tylko jedno w gwole mam koksu pienc gram, odleciec sam w krajine zapomnenia";

        $translate = new GoogleTranslateForFree();
        $result = $translate->translate($source, $target, $text, $attempts);
        dd($result);

        $text = 'adventure';
        $response = Http::get('http://translate.google.ru/translate_a/t?client=x&text=adventure&hl=en&sl=en&tl=ru');
        // $content = file_get_contents('http://translate.google.ru/translate_a/t?client=x&text=adventure&hl=en&sl=en&tl=ru');
        //$data = json_decode($content);
        dd($data = json_decode($response));
    }


    public function game_tag_InputTest()
    {
        $games = Game::orderBy('sales', 'desc')->get();
       // $games = Game::inRandomOrder()->limit(10)->get();
        dd($games[5]->name);

        return view('index', [
            'games' => $games,
            'main_class' => "text-secondary"
        ]);


        $a = @file_get_contents("https://api.rawg.io/api/games/monster-hunter-world?key=9167fc26de294c36bf13e920bff83f3e");

       // if(file_get_contents("https://api.rawg.io/api/games/monster-hunter-world?key=9167fc26de294c36bf13e920bff83f3e"))
        {
            $content = @file_get_contents("https://api.rawg.io/api/games/monster-hunter-world?key=9167fc26de294c36bf13e920bff83f3e");
            $data=json_decode($content);
            dd($data);
        }

        //
//        $isTagFind=Tag::where('name', 'vr mod')->first();
//
//        if($isTagFind) {
//           // dd("govno");
//            dd($isTagFind);
//        }
//        else {dd("Hui");}
        //$strsome="";
//        $numsome=0;
//        $games = Game::all();
//       // $game = Game::where('name', 'Grand Theft Auto V')->first();
//
//        for($i=0; $i<100; $i++)
//        {
//            if ($i==1)
//            {
//                dd($data);
//            }
//            $numsome++;
//           // $strsome=$strsome.$game->name;
//            $slug=Str::slug($games[$i]->name);
//            //dd(urlencode($game->name));
//            $content = file_get_contents("https://api.rawg.io/api/games/$slug?key=9167fc26de294c36bf13e920bff83f3e");
//            $data = json_decode($content);
//
//
//            foreach ($data->tags as $tag)
//            {
//                $isTagFind=Tag::where('name', $tag->name)->first();
//                if($isTagFind)
//                {
//                   // dd($isTagFind);
//                  $games[$i]->tags()->attach($isTagFind->id);
//                }
//            }
//
//        }
       // dd($numsome);

    }

    public  function  justtest()
    {
        $page=1;

        for ($i=1; $i<10; $i++, $page++) {
            $content = file_get_contents('https://api.rawg.io/api/games?key=9167fc26de294c36bf13e920bff83f3e&page_size=40&page=' . $page);
            $data = json_decode($content);
            $games = $data->results;
            foreach ($games as $game) {
                $content = file_get_contents('https://api.rawg.io/api/games/' . $game->slug . '?key=9167fc26de294c36bf13e920bff83f3e');
                $data2 = json_decode($content);
            }
        }

        $content = file_get_contents('https://api.rawg.io/api/games?key=9167fc26de294c36bf13e920bff83f3e&page_size=40');
        $data = json_decode($content);
        $games=$data->results;
        return $games[0]->name;
    }

}
