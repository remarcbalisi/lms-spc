<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    protected $table = 'landing_page';

    protected $fillable = [
        'banner_image', 'head_line'
    ];
}
