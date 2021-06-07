<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function store(Request $request)
    {
        $game = new Game();
        $game->name = 'Somegame3';
        $game->developer = 'Somedeveloper3';
        $game->publisher = 'somePublisher3';
        $game->price = 300;
        $game->score = 65;
        $game->save();
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

    public function destroy($id)
    {
        Game::find($id)->delete();
    }

}
