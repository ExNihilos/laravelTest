<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $id)
    {
        $game = Game::find($id);

        Review::create([
            'text' => $request->text,
            'user_id' => Auth::id(),
            'game_id' => $game->id
        ]);
    }

}
