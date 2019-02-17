<?php

namespace App\Http\Controllers\Lecturer;

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
}
