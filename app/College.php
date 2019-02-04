<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $table = "college";

    protected $fillable = [
        "name", "slug",
    ];
}
