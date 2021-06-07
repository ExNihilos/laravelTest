<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        return Review::all();
    }

    public function store(Request $request, $id)
    {
        $game = Game::find($id);

        return $game->reviews()->create([
            'text' => $request->text,
            'user_id' => Auth::id()
        ]);

//        $review = Review::create([
//            'text' => $request->text,
//            'user_id' => Auth::id(),
//            'game_id' => $game->id
//        ]);

        //return $review;
    }

    public function destroy($reviewId)
    {
        $review = Review::find($reviewId);
        if($review->user_id == Auth::id())
        {
            return $review->delete();
        }
    }

    public function getReviewsByGame($id)
    {
        return Game::find($id)->reviews;
    }

    public function getReviewsByUser($id)
    {
        return User::find($id)->reviews;
    }


}
