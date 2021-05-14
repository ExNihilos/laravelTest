<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectRouteController extends Controller
{
    public function test1(Request $request)
    {
        if($request->isMethod('GET'))
        {
            return view('test.redirect.index');
        }

        else if($request->isMethod('POST')) {
            $email = $request->email;

            if (str_contains($email, '.com')) {
                return $request;
                dd($request);
                return redirect("/test/redirect/3")->withInput();
            } else {
                $check = true;
                return view('test.redirect.index', ['check' => $check]);
            }
        }
    }

    public function test2(Request $request)
    {
        return "Введен корректный email: ".$request->input('email');
    }
}
