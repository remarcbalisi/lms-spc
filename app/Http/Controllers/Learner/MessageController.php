<?php

namespace App\Http\Controllers\Learner;

use App\Message;
use App\MessageThread;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MessageController extends Controller
{
    public function inbox() {
        return view('learner.messages.inbox');
    }

    public function new() {
        return view('learner.messages.new');
    }

    public function store_new_message(Request $request) {
        $request->validate([
            'message' => 'required',
            'receiver' => 'required'
        ]);

        $receiver = User::where('email', $request->input('receiver'))->first();
        $receiver_new_msg_thread = new MessageThread;
        $receiver_new_msg_thread->user_id = $receiver->id;
        $receiver_new_msg_thread->save();

        $sender_new_msg_thread = new MessageThread;
        $sender_new_msg_thread->user_id = Auth::user()->id;
        $sender_new_msg_thread->save();

        $receiver_new_message = new Message;
        $sender_new_message = new Message;

        $receiver_new_message->body = $request->input('message');
        $receiver_new_message->sender = Auth::user()->id;
        $receiver_new_message->receiver = $receiver->id;
        $receiver_new_message->message_thread_id = $receiver_new_msg_thread->id;
        $receiver_new_message->save();

        $sender_new_message->body = $request->input('message');
        $sender_new_message->sender = Auth::user()->id;
        $sender_new_message->receiver = $receiver->id;
        $sender_new_message->message_thread_id = $sender_new_msg_thread->id;
        $sender_new_message->save();

        return redirect()->back()->with([
           'success_msg' => 'Message sent!'
        ]);
    }
}
