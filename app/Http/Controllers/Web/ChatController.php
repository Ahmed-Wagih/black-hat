<?php

namespace App\Http\Controllers\Web;

use App\Events\ChatEvent;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    public function chats(Request $request)
    {
        $usersQuery = User::query();
        $usersQuery = $usersQuery->where('id', '!=', auth()->user()->id);
        if ($request->has('interest_id') && $request->interest_id !== null) {
            $usersQuery = $usersQuery->whereHas('interests', function ($query) use ($request) {
                $query->where('interests.id', $request->interest_id);
            });
        }
        $users = $usersQuery->get();
        return view('web.chats', get_defined_vars());
    }


    public function chat($userId)
    {

        $user = User::find($userId);

        $messages = Message::where(function ($query) use ($userId) {
            return $query->where('sender_id', auth()->user()->id)->where('receiver_id', $userId);
        })->orWhere(function ($query) use ($userId) {
            return $query->where('receiver_id', auth()->user()->id)->where('sender_id', $userId);
        })->orderBy('id', 'asc')->get();

        $unseenMessages =  Message::where('seen', 0)->where(function ($query) use ($userId) {
            return $query->where('receiver_id', auth()->user()->id)->where('sender_id', $userId);
        })->orderBy('id', 'asc')->get();

        $unseenMessages->each(function ($message) {
            $message->seen = true;
            $message->save();
        });

        return view('web.chat', get_defined_vars());
    }


    public function storeChat(Request $request)
    {
        $data = [];
        $data['sender_id'] = auth()->user()->id;
        $data['receiver_id'] = $request->user_id;
        $data['message'] = $request->message;
        $receiver = User::find($request->user_id);

        $message = Message::create($data);
        event(new ChatEvent($receiver, $request->message));
        return response()->json(['message' => 'success']);
    }

    public function search(Request $request)
    {
        if ($request->search && $request->search != null) {
            $users = User::where('id', '!=', auth()->user()->id)->where(function ($query) use ($request) {
                return $query->where('full_name', 'LIKE', '%' . $request->search . '%')->orWhere('email', 'LIKE', '%' . $request->search . '%');
            })->get();
            return view('web.compoonents.chats_search', get_defined_vars());
        }
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('web.compoonents.chats_search', get_defined_vars());
    }
}
