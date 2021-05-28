<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class MarketController extends Controller
{
    public function index(Request $request)
    {

        $gamesArr = [];
        //dd($request->tags);
        foreach ($request->tags as $tag)
        {
            $games = Tag::find($tag)->games()->get();
            foreach ($games as $game)
            {
                array_push($gamesArr, $game);
            }

        }


        //dd($gamesArr);
        $games = new LengthAwarePaginator(array_slice($gamesArr,1,15), count($gamesArr), 15,1);
        //dd($games);
        //$games=($gamesArr);

       // $games = Game::paginate(15);



        $content = file_get_contents('https://api.rawg.io/api/genres?key=9167fc26de294c36bf13e920bff83f3e');
        $data = json_decode($content);
        $genres = $data->results;
        $tags= Tag::limit(10)->get();
        //dd($games);
        return view('GamePortal.market.index', [
            'market_class' => 'text-secondary',
            'games' => $games,
            'genres' => $genres,
            'tags' => $tags
        ]);
    }

    public function show($genre)
    {
        $content = file_get_contents('https://api.rawg.io/api/genres?key=9167fc26de294c36bf13e920bff83f3e');
        $data = json_decode($content);
        $genres = $data->results;
        $games = Game::where('genre', $genre)->get();
        $tags= Tag::limit(10)->get();
        return view('GamePortal.market.show', [
            'games' => $games,
            'genres' => $genres,
            'tags' => $tags
        ]);
    }

    public function showWithTags(Request $request)
    {
        dd($request->tags);
        $gamesArr=[];
        //dd($request->tags);
       // $games = Game::tags($request->tags);
        foreach ($request->tags as $tag)
        {
            $games = Tag::find($tag)->games()->get();
            foreach ($games as $game)
            {
                array_push($gamesArr, $game);
            }

        }

        //$games->paginate(15);
       // $games = Tag::where('name',)->games();
        dd($gamesArr);

        $content = file_get_contents('https://api.rawg.io/api/genres?key=9167fc26de294c36bf13e920bff83f3e');
        $data = json_decode($content);
        $genres = $data->results;
        $tags= Tag::limit(10)->get();

        return view('GamePortal.market.show', [
            'games' => $games,
            'genres' => $genres,
            'tags' => $tags
        ]);
    }
}
