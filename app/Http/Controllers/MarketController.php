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


//        $arr= [4,3,2,1,6,3,1,3,7,9,4,3];
//        $pagination = new LengthAwarePaginator(array_slice($arr,4*$request->page-4,4, true), count($arr), 4);
//        dd($pagination);

        if(!$request->tags)
        {
            $games = Game::paginate(15);
        }

        else {

            $gamesArr = [];


//            $games = Tag::find(1)->games()->limit(10)->get();
//            foreach ($games as $game)
//            {
//                if(!in_array($game, $gamesArr)) {
//                    array_push($gamesArr, $game);
//                }
//            }
//
//
//            $games = Tag::find(2)->games()->limit(10)->get();
//            foreach ($games as $game)
//            {
//                if(!in_array($game, $gamesArr)) {
//                    array_push($gamesArr, $game);
//                }
//            }
//
//            dd($gamesArr);
//
//
//
//            $game= Game::find(1);
//            if(!in_array($game, $gamesArr)) {
//                array_push($gamesArr, $game);
//            }
//
//            $game= Game::find(1);
//
//            if(!in_array($game, $gamesArr)) {
//                array_push($gamesArr, $game);
//            }
//            dd($gamesArr);



//
//            for($i=1; $i<=2; $i++)
//            {
////                $tag = Tag::find(1);
////                $games= $tag->games;
////                dd($games);
//
//                $games = Tag::find(1)->games()->limit(10)->get();
//              //  dd($games);
//
//
//                foreach ($games as $game)
//                {
//                    if(!in_array($game, $gamesArr)) {
//                        array_push($gamesArr, $game);
//                    }
//                }
//                //dd($game);
//
//            }
//
//            $game = Game::find(1);
//            if(!in_array($game, $gamesArr)) {
//                array_push($gamesArr, $game);
//            }
//            dd($gamesArr);


            foreach ($request->tags ?? [] as $tag)
            {
                $check = true;
                $games = Tag::find($tag)->games()->get();
                foreach ($games as $game)
                {
                    if (count($gamesArr) == 0)
                    {
                        array_push($gamesArr, $game);
                        continue;
                    }

                    foreach ($gamesArr as $item)
                    {
                        if ($game->id == $item['id'])
                        {
                            $check = false;
                            break;
                        }

                        $check=true;
                    }

                    if ($check == true)
                    {
                        array_push($gamesArr, $game);
                    }

                }
            }

           // dd($gamesArr);

            $games = new LengthAwarePaginator(array_slice($gamesArr, 20 * $request->page - 20, 20), count($gamesArr), 20, null, ['pageName' => 'page', "path" => "http://127.0.0.1:8000/market"]);
            $games->withPath('/market')->withQueryString();
        }

        $content = file_get_contents('https://api.rawg.io/api/genres?key=9167fc26de294c36bf13e920bff83f3e');
        $data = json_decode($content);
        $genres = $data->results;

        $tags = Tag::limit(15)->get();

        return view('GamePortal.market.index', [
            'market_class' => 'text-secondary',
            'games' => $games,
            'genres' => $genres,
            'tags' => $tags,
            'reqTags' => $request->tags
        ]);
    }


    public function show($genre)
    {
        $content = file_get_contents('https://api.rawg.io/api/genres?key=9167fc26de294c36bf13e920bff83f3e');
        $data = json_decode($content);
        $genres = $data->results;
        $games = Game::where('genre', $genre)->paginate(15);
        $tags = Tag::limit(10)->get();
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
