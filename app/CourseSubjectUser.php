<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseSubjectUser extends Model
{
    protected $table = "course_subject_user";

    protected $fillable = [
        "user_id", "course_subject_id", "activation_link", "is_activated",
    ];
}
