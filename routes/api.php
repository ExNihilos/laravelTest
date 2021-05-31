<?php

use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/games/{slug}', [GameController::class, 'apiGameShow']);
Route::get('/games/store', [GameController::class, 'store']);

Route::post('/games/{id}/reviews', [ReviewController::class, 'store'])->name('reviews.store');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});

//Route::get('/games/reqtest', [GameController::class, 'testRequest']);
