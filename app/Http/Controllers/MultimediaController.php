<?php

namespace App\Http\Controllers;

use App\Multimedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MultimediaController extends Controller
{
    public function download($multimedia_id){
        $multimedia = Multimedia::where('id', $multimedia_id)->first();
        return Storage::download($multimedia->directory);
    }
}
