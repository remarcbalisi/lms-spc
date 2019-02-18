<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageThread extends Model
{
    protected $table = "message_thread";

    protected $fillable = [
        "user_id"
    ];

    public function messages() {
        return $this->hasMany('App\Message', "message_thread_id", "id");
    }

    public function mark_as_read($user_id){
        foreach($this->messages()->where(['is_read'=>false, 'receiver'=>$user_id])->get() as $message){
            $message->is_read = true;
            $message->save();
        }
    }

    public function get_receiver($user_id) {
        $receiver = $this->messages()->where('receiver', '!=', $user_id)->first();

        if( !$receiver ){
            $receiver = $this->messages()->where('sender', '!=', $user_id)->first()->sender()->first();
        }else {
            $receiver = $receiver->receiver()->first();
        }

        return $receiver;
    }
}
