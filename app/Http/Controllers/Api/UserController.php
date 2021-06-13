<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\FriendRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        return User::find($id)->delete();
    }

    //!!!
    public function profile()
    {
         $user = User::find(Auth::user())->first();

         return response()->json([
             'user'=>$user
             ], 200);
         //return $user;
         //return response()->json($user, 200);
    }

    public function friendRequest(Request $request, $sender, $recipient)
    {
        $friendRequest = FriendRequest::create([
            'sender_id' => $sender,
            'recipient_id' => $recipient
        ]);

        return response()->json($friendRequest, 200);
    }



    public function friendStore(Request $request)
    {
        $friend = new Friend();
        $friend->user_id = $request->user;
        $friend->friend_id = $request->friend;
        $friend->save();

        $friend = new Friend();
        $friend->user_id = $request->friend;
        $friend->friend_id = $request->user;
        $friend->save();

        $friendRequest = FriendRequest::where('sender_id', $request->user)
            ->orWhere('recipient_id', $request->user);
        $friendRequest->delete();

        return response()->json('friend add success', 200);
    }

    public function friendDeny(Request $request)
    {
        $f=FriendRequest::where('sender_id', $request->sender)->where('recipient_id', $request->recipient)->delete();
        return redirect()->json('friend remove success', 200);
    }

    public function getFriends()
    {
        $user = User::find(Auth::id());
        return $user->friends;
    }

}
