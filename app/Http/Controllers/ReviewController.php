<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $name)
    {
        $game = Game::where('name', $name)->first();

        Review::create([
            'text' => $request->text,
            'user_id' => Auth::id(),
            'game_id' => $game->id
        ]);

        return redirect()->back();
    }
}
