<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = "message";

    protected $fillable = [
        "body", "sender", "receiver", "message_thread_id"
    ];

    public function message_thread() {
        return $this->belongsTo("App\MessageThread", "message_thread_id");
    }
}
