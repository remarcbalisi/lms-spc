<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicYearSemester extends Model
{
    protected $table = "academic_year_semester";

    protected $fillable = [
        "academic_year_id",
        "semester_id",
    ];

    public function academic_year(){
        return $this->belongsTo("App\AcademicYear", "academic_year_id");
    }

    public function semester(){
        return $this->belongsTo("App\Semester", "semester_id");
    }

    public function courses(){
        return $this->hasMany("App\Course", "academic_year_semester_id", "id");
    }

    public function getSemesterFullName(){
        return "AY " . $this->academic_year->start . " - " . $this->academic_year->end . ", " . $this->semester->term . " Semester";
    }
}
