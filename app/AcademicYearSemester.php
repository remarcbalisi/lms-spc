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
}
