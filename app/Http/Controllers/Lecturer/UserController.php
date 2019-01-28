<?php

namespace App\Http\Controllers\Lecturer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function home(){
        return view('lecturer.home');
    }
}
