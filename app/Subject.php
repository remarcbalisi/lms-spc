<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = "subject";

    protected $fillable = [
        "title", "code", "description", "img", "is_lab", "max_student",
    ];
}
