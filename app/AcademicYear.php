<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicYear extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'academic_year';

    protected $fillable = [
        'start', 'end'
    ];

    public function academic_year_semesters(){
        return $this->hasMany("App\AcademicYearSemester", "academic_year_id", "id");
    }
}
