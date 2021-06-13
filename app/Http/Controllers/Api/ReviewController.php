<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Review;
use App\Models\User;
use http\Env\Response;
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

    public function destroy($id)
    {
        $review = Review::find($id);
        $user = Auth::user();
        if($review->user_id == $user->id || $user->tokenCan('admin'))
        {
            return response()->json($review->delete(),200);
        }

        else return response()->json('Unauthenticated access', 401);
    }

    public function getReviewsByGame($id)
    {
//        return Game::find($id)->reviews;
//        $reviews = Game::find($id)->reviews->with('user');
//        return Game::find($id)->reviews->with('reviews.user');
        $reviews = Review::with('user')->where('game_id', $id)->get();
        return response()->json($reviews);

        // return response()->json($reviews);
    }

    public function getReviewsByUser($id)
    {
        return User::find($id)->reviews;
    }

}
