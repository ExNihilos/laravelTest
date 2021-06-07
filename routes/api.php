<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\UserController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('api.login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/games/{slug}', [GameController::class, 'apiGameShow']);
Route::get('/games/store', [GameController::class, 'store']);

Route::get('/reviews', [ReviewController::class, 'index']);
Route::get('/games/{id}/reviews', [ReviewController::class, 'getReviewsByGame']);
Route::get('/users/{id}/reviews', [ReviewController::class, 'getReviewsByUser']);
Route::post('/games/{id}/reviews', [ReviewController::class, 'store'])->middleware('auth:sanctum');
Route::delete('/reviews/{reviewId}', [ReviewController::class, 'destroy'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/profile', [UserController::class, 'profile']);
    Route::get('/friends', [UserController::class, 'getFriends']);
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
