<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    protected $table = 'privilege';

    protected $fillable = [
        'action', 'table'
    ];
}
