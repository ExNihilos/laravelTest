<?php

use App\Http\Controllers;
use App\Http\Controllers\BladeController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RedirectRouteController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TestGameController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/pages/show/{id}', [PageController::class, 'showOne'])->where('id', '[0-9]+');
Route::get('/pages/all', [PageController::class, 'showAll']);
Route::get('/test/sum/{num1}/{num2}', [PageController::class, 'test'])->where(['num1' => '[0-9]+', 'num2'=>'[0-9]+']);
Route::get('/employees/{id}', [Controllers\EmployeeController::class, 'showOne'])->where('id', '[1-5]{1}');
Route::get('/employees/{id}/{field}', [Controllers\EmployeeController::class, 'showField'])->where(['id' =>'[1-5]{1}', 'field'=>'name||surname||salary']);


Route::group(['prefix'=>'test'], function() {

    Route::get('/', function (Request $request) {
        return dd($request);
    });

    Route::get('/view/link', [PageController::class, 'viewTest']);

    Route::get('/blade/condition', [BladeController::class, 'condition']);
    Route::get('/blade/loop', [BladeController::class, 'loop']);

    Route::get('/blade/qwe', [BladeController::class, 'qwe']);
    Route::get('/blade/practice', [BladeController::class, 'test9']);
    Route::get('/blade/month', [BladeController::class, 'month']);
    Route::get('/posts/{id}', [PostController::class, 'showOne'])->name('posts.show');
    Route::get('/posts',[PostController::class, 'showAll']);
    Route::get('/product/{category_id}/{product_id}', [ProductController::class, 'showProduct'])->name('product.show');
    Route::get('/product/{category_id}', [ProductController::class, 'showCategory'])->name('product.index');;
    Route::get('/categories', [ProductController::class, 'showCategoryList']);

    Route::get('/forms', [FormController::class, 'test']);
    Route::post('/forms/submit', [FormController::class, 'submit'])->name('forms.submit');
    Route::post('/forms/1', [FormController::class, 'test1'])->name('forms.test1');
    Route::post('/forms/2', [FormController::class, 'test2'])->name('forms.test2');
    Route::get('/forms/method', [FormController::class, 'test3']);
    Route::get('/session/1', [FormController::class, 'test4']);
    Route::get('/session/2', [FormController::class, 'test5']);
    Route::get('/session/3', [FormController::class, 'test6']);
    Route::get('/session/4', [FormController::class, 'test7']);

    Route::get('/redirect/1', [RedirectRouteController::class, 'test1']);
    Route::post('/redirect/1', [RedirectRouteController::class, 'test1']);
    Route::get('/redirect/3', [RedirectRouteController::class, 'test2']);

});


Route::get('/', [GameController::class, 'testGameInput'])->name('game.index');
Route::get('/games', [GameController::class, 'index']);
Route::get('/games/test', [GameController::class, 'test']);
Route::get('/games/reqtest', [GameController::class, 'testRequest']);
Route::get('/games/{name}', [GameController::class, 'show'])->name('game.show');
Route::post('/games/search', [GameController::class, 'search'])->name('game.search');
Route::get('/friends', [UserController::class, 'index'])->name('friend.index');
Route::post('/friendrequest/{sender}/{recipient}', [UserController::class, 'friendRequest'])->name('user.friendrequest');
Route::get('/friendstore', [UserController::class, 'friendStore'])->name('friend.store');
Route::get('/frienddeny', [UserController::class, 'friendDeny'])->name('friend.deny');
Route::get('/frienddestroy', [UserController::class, 'friendDestroy'])->name('friends.destroy');

Route::get('/market', [MarketController::class, 'index'])->name('market.index');
Route::get('/market/{genre}', [MarketController::class, 'show'])->name('market.show');
Route::get('/market/tags', [MarketController::class, 'showWithTags'])->name('market.search');

Route::post('/games/{id}/reviews', [ReviewController::class, 'store'])->name('reviews.store');


Route::put('/users/{id}/update', [GameController::class, 'userupdate'])->name('user.update');
Route::get('/users/me', [UserController::class, 'edit'])->name('user.edit');

//Route::get('/index', function (){
//   return view('index');
//})->middleware('auth');

Route::get('/{year}/{month}/{day}', function ($year, $month, $day){return "{$year}-{$month}-{$day}";})
    ->where(['year'=>'[0-9]{4}', 'month'=>'0[1-9]|1[0-2]','day'=>'[0-2][0-9]|3[0-1]']);

//Route::get('user/{name?}', function ($name = null) {
//    return $name;
//});


Route::prefix('/admin')->name('admin.')->group(function() {
    Route::get('user/{user}', function (User $user){
        return $user->email;
    })->name('user');

    Route::get('postsInfo/{test}', function (){
        return dd("Posts:1,2,3");
    })->name('posts')->where('test','[0-9]+');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/test', [TestGameController::class, 'game_tag_InputTest']);
Route::get('/test/translate', [TestGameController::class, 'testTranslate']);
Route::get('/test/justtest', [TestGameController::class, 'justtest']);
Route::get('/test/login', [TestGameController::class, 'testLogin']);
Route::get('/test/basic', [TestGameController::class, 'baseAuth'])->middleware('auth.basic');
Route::get('/test/friends', [TestGameController::class, 'friends']);


require __DIR__.'/auth.php';
