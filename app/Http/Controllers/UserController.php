<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\FriendRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function friendDestroy(Request $request)
    {
        Friend::where('user_id',$request->user_id)
            ->where('friend_id', $request->friend_id)
            ->orWhere('friend_id',$request->user_id)
            ->where('user_id', $request->friend_id)
            ->delete();

        return redirect()->back();
    }

    public function friendDeny(Request $request)
    {
        $f=FriendRequest::where('sender_id', $request->sender)->where('recipient_id', $request->recipient)->delete();
        return redirect()->back();
    }

    public function friendStore(Request $request)
    {
        //dd($request);
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

        return redirect()->back();
    }

    public function index()
    {
        $senders = [];
        $users = User::all();

        $friendRequests = $this->checkRequest() ?? null;

        foreach ($friendRequests as $friendRequest)
        {
            array_push($senders, User::find($friendRequest->sender_id));
        }

        $friendsIds = Friend::where('user_id', Auth::id())->get();
        $friends = [];

        //dd($friendsIds);
        foreach($friendsIds as $friendsId)
        {
            array_push($friends, User::find($friendsId->friend_id));
        }


        return view('GamePortal.user.index', [
            'users' => $users,
            'senders' => $senders ?? null,
            'friends' => $friends ?? null,
            'friends_class' => "text-secondary"
//            'friendRequests' => $friendRequests->sender_id ?? null
            ]);

    }

    public function friendRequest(Request $request, $sender, $recipient)
    {
        //dd($request, $sender, $recipient);
        FriendRequest::create([
            'sender_id' => $sender,
            'recipient_id' => $recipient
        ]);

        return redirect()->back();
    }

    public function checkRequest()
    {
       return FriendRequest::where('recipient_id', Auth::id())->get();
    }

    public function edit()
    {
        return view('GamePortal.user.edit', [
            'user' => Auth::user()
        ]);
    }
}
