<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = "classroom";

    protected $fillable = [
        "academic_year_id", "section_id", "course_id", "semester_id",
    ];

    public function academic_year(){
        return $this->belongsTo("App\AcademicYear", "academic_year_id");
    }

    public function section(){
        return $this->belongsTo("App\Section", "section_id");
    }

    public function course(){
        return $this->belongsTo("App\Course", "course_id");
    }

    public function semester(){
        return $this->belongsTo("App\Semester", "semester_id");
    }
}
