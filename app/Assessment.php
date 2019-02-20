<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $table = "assessment";

    protected $fillable = [
        "score", "total_items", "date_taken", "assessment_type_id", "course_subject_user_id"
    ];

    public function assessment_type() {
        return $this->belongsTo("AssessmentType", "assessment_type_id");
    }

    public function course_subject_user() {
        return $this->belongsTo("CourseSubjectUser", "course_subject_user_id");
    }
}
