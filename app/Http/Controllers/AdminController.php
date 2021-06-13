<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function login(Request $request)
    {
//?????????
//        $request->validate([
//            'login' => 'required|string|email',
//            'password' => 'required|string|min:1'
//        ]);

//        if (!Auth::attempt($request->only('email', 'password'))) {
//            throw ValidationException::withMessages([
//                __('auth.api')
//            ]);
//        }
        //$admin=Admin::where('login', 'adm@mail.com')->first();
       // return response()->json($admin);
        $admin = Admin::where('login', $request->login)->first();
//        return response()->json($admin);
        if(Hash::check($request->password, $admin->password))
        {
            $token = $admin->createToken('admin_token', ['admin'])->plainTextToken;
            return response()->json([
                 'admin' => $admin,
                'token' => $token
            ], 200);
        }

        else {
            throw ValidationException::withMessages([
                'error' => 'Incorrect login or password!'
            ]);
        }
    }

    public function ban(Request $request, $id)
    {
        if (Auth::user()->tokenCan('admin'))
        {
            //$is_banned = json_decode($request->is_banned);
            $user = User::find($id);
            $user->is_banned = $request->is_banned;
            $user->save();
            return response()->json($user, 200);
        }

        else return response()->json('Unauthenticated access', 401);
    }
}
