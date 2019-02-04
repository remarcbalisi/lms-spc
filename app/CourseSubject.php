<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseSubject extends Model
{
    protected $table = "course_subject";

    protected $fillable = [
        "course_id", "subject_id", "academic_year_semester_id", "section_id"
    ];

    public function course(){
        return $this->belongsTo("App\Course", "course_id");
    }

    public function subject(){
        return $this->belongsTo("App\Course", "subject_id");
    }

    public function academic_year_semester(){
        return $this->belongsTo("App\Course", "academic_year_semester");
    }

    public function section(){
        return $this->belongsTo("App\Course", "section");
    }
}
