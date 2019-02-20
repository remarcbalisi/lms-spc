<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseSubjectUser extends Model
{
    protected $table = "course_subject_user";

    protected $fillable = [
        "user_id", "course_subject_id", "activation_link", "is_activated",
    ];

    public function user(){
        return $this->belongsTo("App\User", "user_id");
    }

    public function course_subject(){
        return $this->belongsTo("App\CourseSubject", "course_subject_id");
    }

    public function posts(){
        return $this->hasMany("App\Post", "course_subject_user_id", "id");
    }

    public function assessments(){
        return $this->hasMany("App\Assessment", "course_subject_user_id", "id");
    }
}
