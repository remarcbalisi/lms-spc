<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "post";

    protected $fillable = [
        "title", "body", "course_subject_user_id", "post_type_id"
    ];

    public function course_subject_user(){
        return $this->belongsTo("App\CourseSubjectUser", "course_subject_user_id");
    }

    public function post_type(){
        return $this->belongsTo("App\PostType", "post_type_id");
    }
}
