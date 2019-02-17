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
}
