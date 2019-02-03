<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = "section";

    protected $fillable = [
        "name", "slug", "course_id"
    ];

    public function course(){
        $this->belongsTo("App\Course", "course_id");
    }

}
