<?php

namespace App\Http\Controllers;

use App\Models\Game;
//use http\Client;
use http\QueryString;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    public function apiGameShow($slug)
    {
        $content = file_get_contents('https://api.rawg.io/api/games?key=9167fc26de294c36bf13e920bff83f3e&search='.urlencode($slug).'&search_exact=true');
        $data = json_decode($content);
        $game=$data->results;

        return response()->json($game, 200);
    }

    public function search(Request $request)
    {
        $name = $request->search;
        //dd($name);
        return redirect()->route('game.show', $name);
        //$this->show($name);
        //return view('GamePortal.show');
    }

    public function useredit()
    {
        return view('GamePortal.user.edit');
    }
    public  function  justtest()
    {
        $content = file_get_contents('https://api.rawg.io/api/games?key=9167fc26de294c36bf13e920bff83f3e&page_size=40');
        $data = json_decode($content);
        $games=$data->results;
        return $games[0]->name;
    }
    public function index(Request $request)
    {
        $games = Game::all();
        return view('GamePortal.games', ['games' => $games]);
    }

    function escapefile_url($url){
        $parts = parse_url($url);
        $path_parts = array_map('rawurldecode', explode('/', $parts['path']));

        return

            implode('/', array_map('rawurlencode', $path_parts))
            ;
    }

    public function show($name)
    {
        //return urlencode($name);
        //$name=$this->escapefile_url($name);

        $content = file_get_contents('https://api.rawg.io/api/games?key=9167fc26de294c36bf13e920bff83f3e&search='.urlencode($name).'&search_exact=true');
        $data = json_decode($content);
        $game=$data->results;

        //dd($game[0]->slug);
        $content = file_get_contents('https://api.rawg.io/api/games/'.$game[0]->slug.'/movies?key=9167fc26de294c36bf13e920bff83f3e');
        $data = json_decode($content);
        $trailer = $data->results[0] ?? null;
        //dd($game);
        //dd($trailer->data->max);


        return view('GamePortal.show', ['game'=>$game, 'trailer'=>$trailer]);
    }

    public function store()
    {
        $game = new Game();
        $game->name = 'Somegame3';
        $game->developer = 'Somedeveloper3';
        $game->publisher = 'somePublisher3';
        $game->price = 300;
        $game->score = 65;
        $game->save();
    }

    public function test()
    {
        $client = new Client();
        $request = new Client\Request();

        $request->setRequestUrl('https://ivaee-internet-video-archive-entertainment-v1.p.rapidapi.com/Images/%7Bfilepath%7D/Redirect');
        $request->setRequestMethod('GET');
        $request->setQuery(new QueryString([
            'Redirect' => 'True'
        ]));

        $request->setHeaders([
            'accept' => 'application/json',
            'x-rapidapi-key' => '239a0633bbmsh0b1aaed997d45f9p1a0d9cjsnf61dc5521344',
            'x-rapidapi-host' => 'ivaee-internet-video-archive-entertainment-v1.p.rapidapi.com'
        ]);

        $client->enqueue($request)->send();
        $response = $client->getResponse();

        echo $response->getBody();
    }


    public function testRequest()
    {
        // variant 1

        $response = Http::get('https://api.rawg.io/api/creators/1', [
            'key' => '9167fc26de294c36bf13e920bff83f3e'
        ]);

//         return $response;  // object Response
//         return $response->json(); // json
//         dd($response->json()); // array
//         dd(json_decode($response)); // object
//
         $data = json_decode($response); // object
//         return $data->platforms->results[0]->percent; // data
//         return $data->platforms->results[0] // ошибка

        $name = $data->name;
        $id = $data->id;
        $position = $data->positions[0]->name;
        //dd($id, $name, $position);


//         return ($response['platforms']['results']); // json
//         return $response['platforms']['results'][0]; // json
//         return $response['platforms']['results'][0]['percent']; // data
//
//         return $response->json()['platforms']['results'][0]['percent']; // | то же самое?

        $name = $response['name'];
        $id = $response['id'];
        $position=$response['positions'][0]['name'];
        //dd($id, $name, $position);





        // variant 2

        $content = file_get_contents('https://api.rawg.io/api/creators/1?key=9167fc26de294c36bf13e920bff83f3e');
//        return $content; // string
        $data = json_decode($content);
//        return $data; // ошибка
//        dd($data); // object
//        return response()->json($data); // json
//        return $data->platforms->results; // json
//        return $data->platforms->results[0]->percent; // data

        $name = $data->name;
        $id = $data->id;
        $position = $data->positions[0]->name;
        //dd($id, $name, $position);





        // variant 3

        $client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ],
        ]);

        $response = $client->request(
            'GET',
            'https://api.rawg.io/api/creators/1?key=9167fc26de294c36bf13e920bff83f3e'
        );

        // return response()->json($response->getBody()); // нихуя не выводит
        // return $response->getBody(); // object GuzzleHttp\Psr7\Stream

         $data = $response->getBody();

         $data = json_decode($data); // object
         //return $data; // ошибка
         //dd($data);
         $name = $data->name;
         $id = $data->id;
         $position = $data->positions[0]->name;
         //dd($id, $name, $position);

         $data = json_decode($data, true); // array
         //return $data; // json
         $name = $data['name'];
         $id = $data['id'];
         $position = $data['positions'][0]['name'];
         //dd($id, $name, $position);

    }

    public function testGameInput()
    {
        $content = file_get_contents('https://api.rawg.io/api/games?key=9167fc26de294c36bf13e920bff83f3e&page=3');
        $data = json_decode($content);
//        return $data; // ошибка
//        dd($data); // object
//        return response()->json($data); // json
//        return $data->platforms->results; // json
//        return $data->platforms->results[0]->percent; // data

        $data=$data->results;
        //dd($data);

        //$name = $data->name;
        //$image = $data;

        return view('index', [
            'data' => $data,
            'main_class' => "text-secondary"
        ]);

//        return view('index', [
//            'name' => $name,
//            'image' => $image
//        ]);
    }
}
