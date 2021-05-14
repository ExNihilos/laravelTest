<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class FormController extends Controller
{
    public function test()
    {
        return view('test.forms.index');
    }

    public function submit(Request $request)
    {
        $number1 = $request->number1;
        $number2 = $request->number2;
        $number3 = $request->number3;
        $method =  $request->method();

        if($request->isMethod('GET'))
        {
            $msg='!';
        }

        if($request->isMethod('POST'))
        {
            $msg='!!';
        }

        else $msg='hui';
        return view('test.forms.show', [
            'num1'=>$number1,
            'num2'=>$number2,
            'num3'=>$number3,
            'method'=>$method,
            'msg' => $msg
        ]);
    }

    public function test1(Request $request)
    {
        $array = $request->except(['token']);
//        dd($array);
        return view('test.forms.index', [
            'array' => $array,

        ]);
    }

    public function test2(Request $request)
    {
        $data = $request->only(['name', 'surname', 'login']);
        dd($data);
        return view('test.forms.index', [
            'data' => $data,
        ]);
    }

    public function test3(Request $request)
    {
        dd($request->session()->all());
        return [
            $request->path(),
            $request->url(),
            $request->fullUrl(),
            $request->fullUrlWithQuery(['page'=>1]),
            $request->is('test/forms/*'),
            $request->session()
        ];
    }

    public function test4(Request $request)
    {
        $request->session()->put(['someKey'=>'someValue']);
        $request->session()->flush();
        dd($request->session());
        return $request->session()->get('someKey', 'undefined');
    }

    public function test5(Request $request)
    {
        $count = $request->session()->get('relCounter', 0);
        $request->session()->put('relCounter', ++$count);

        return view('test.forms.index', ['relCount'=>$count]);
    }

    public function test6(Request $request)
    {
        if ($request->session()->exists('time'))
            $time=$request->session()->get('time', now());
        else {
            $request->session()->put('time', now());
            $time= now();
        }

        return view('test.forms.index', ['relCount'=>$time]);
    }

    public function test7(Request $request)
    {
        $request->session()->flush();
        $request->session()->put('test1', 9);
        $request->session()->put('test2', 'qwerty');
        $request->session()->put('test3', 'asdzxc');
        $arr = $request->session()->all();
        $request->session()->put('test', 'justatest');
        $request->session()->flush();

        if ($request->session()->has('test'))
        {
            $test = $request->session()->get('test');
        }

        else {
            $request->session()->put('test', now());
            $test = $request->session()->get('test');
        }



        session()->put('new','asd');
        dd($request->session()->all());



        return view('test.forms.index', [
            'arr'=>$arr,
            'test'=>$test,
        ]);
    }


}

