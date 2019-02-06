<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    protected $table = "post_type";

    protected $fillable = [
        "name", "slug",
    ];
}
