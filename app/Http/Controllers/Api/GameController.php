<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function store(Request $request)
    {
//        $game = new Game();
//        $game->name = $request->name;
//        $game->developer = $request->developer;
//        $game->publisher = $request->publisher;
//        $game->price = $request->price;
//        $game->metacritic = $request->metacritic;
//        $game->save();


//        $game = Game::create([
//            'name' => $request->name,
//            'developer' => $request->developer,
//            'publisher' => $request->publisher,
//            'price' => $request->price,
//            'metacritic' =>  $request->metacritic
//    ]);


//        $game = Game::create($request->toArray());


        if(Auth::user()->tokenCan('admin'))
        {
            $game = Game::create($request->all());
//        foreach ($request->tags as $tag)
//        {
//           // $game->tags()->attach($request->$tag);
//        }
            $game->tags()->attach($request->tags);
            return response()->json($game, 200);
        }

        else return response()->json('Unauthenticated access',401);
    }


    public function apiGameShow($slug)
    {
        $content = file_get_contents('https://api.rawg.io/api/games?key=9167fc26de294c36bf13e920bff83f3e&search='.urlencode($slug).'&search_exact=true');
        $data = json_decode($content);
        $game=$data->results;

        return response()->json($game, 200);
    }

    public function index()
    {
        return Game::all();
    }

    public function show($id)
    {
        return Game::find($id);
    }

    public function update(Request $request, $id)
    {
       // return response()->json($request->all());
       $game = Game::find($id)->update($request->all());
       return response()->json($game, 200);
    }

    public function destroy($id)
    {
        if (Auth::user()->tokenCan('admin'))
        {
            Game::findOrFail($id)->delete();
            return response('delete success', 200);
        }

        else return response()->json('Unauthenticated access',401);
    }

    public function buy($id)
    {
        $game = Game::find($id);
        Library::create([
            'game_id' => $game->id,
            'user_id' => Auth::id(),
        ]);

//        Auth::user()->attach($game);
        $game->sales += 1;
        $game->save();
        return response('purchase success', 200);
    }

    public function library()
    {
        $library = Auth::user()->library;
        return response()->json($library, 200);
    }
}
