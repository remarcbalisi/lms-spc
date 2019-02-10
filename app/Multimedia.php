<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    protected $table = "multimedia";

    protected $fillable = [
        "type", "directory", "post_id"
    ];

    public function post(){
        return $this->belongsTo("App\Post", "post_id");
    }
}
