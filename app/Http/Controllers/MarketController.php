<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function index()
    {
        $games = Game::paginate(15);

        //dd($games);
        return view('GamePortal.market.index', [
            'market_class' => 'text-secondary',
            'games' => $games
        ]);
    }
}
