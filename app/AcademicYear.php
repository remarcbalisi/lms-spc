<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    protected $table = 'academic_year';

    protected $fillable = [
        'start', 'end'
    ];
}
