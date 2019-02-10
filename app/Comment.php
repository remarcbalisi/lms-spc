<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comment";

    protected $fillable = [
        "post_id", "commented_by", "body"
    ];

    public function post(){
        return $this->belongsTo("App\Post", "post_id");
    }

    public function commentator(){
        return $this->belongsTo("App\User", "commented_by");
    }

}
