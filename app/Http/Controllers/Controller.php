<?php

namespace App\Http\Controllers;

use App\MessageThread;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {

        Event::listen(Authenticated::class, function ($event) {
            $this->currentUser = $event->user;
            $new_messages = [];

            foreach( MessageThread::where('user_id', $this->currentUser->id)->get() as $message_thread ) {
                $unread_messages = $message_thread->messages()->where('is_read', false)->get();
                foreach($unread_messages as $unread_message){
                    array_push($new_messages, $unread_message);
                }
            }

            // Sharing is caring
            View::share('new_messages', $new_messages);
            // other code that may need to bootstrap stuff for this user in the base controller
        });
    }
}
