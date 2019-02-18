<?php

namespace App\Http\Controllers\Lecturer;

use App\Message;
use App\MessageThread;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MessageController extends Controller
{
    public function inbox() {
        return view('lecturer.messages.inbox')->with([
            'message_threads'=> MessageThread::where('user_id', Auth::user()->id )->get(),
        ]);
    }

    public function view_messages($message_thread_id){
        $message_thread = MessageThread::where('id', $message_thread_id)->first();
        $message_thread->mark_as_read(Auth::user()->id);

        return view('lecturer.messages.view')->with([
            'message_thread' => $message_thread
        ]);
    }

    public function reply(Request $request, $message_thread_id) {
        $request->validate([
            'message' => 'required'
        ]);
        $message_thread = MessageThread::where('id', $message_thread_id)->first();
        $receiver = $message_thread->get_receiver(Auth::user()->id, $message_thread_id);

        $sender_new_message = new Message;
        $sender_new_message->body = $request->input('message');
        $sender_new_message->sender = Auth::user()->id;
        $sender_new_message->receiver = $receiver->id;
        $sender_new_message->message_thread_id = $message_thread_id;
        $sender_new_message->is_read = true;
        $sender_new_message->save();

        $receiver_message_thread = MessageThread::where('user_id', $receiver->id)->first();
        $receiver_new_message = new Message;
        $receiver_new_message->body = $request->input('message');
        $receiver_new_message->sender = Auth::user()->id;
        $receiver_new_message->receiver = $receiver->id;
        $receiver_new_message->message_thread_id = $receiver_message_thread->id;
        $receiver_new_message->save();

        return redirect()->back();

    }
}
