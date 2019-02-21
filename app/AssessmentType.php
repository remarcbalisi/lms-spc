<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssessmentType extends Model
{
    protected $table = "assessment_type";

    protected $fillable = [
        "type", "slug"
    ];
}
