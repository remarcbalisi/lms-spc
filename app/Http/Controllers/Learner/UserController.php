<?php

namespace App\Http\Controllers\Learner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function home(){
        return view('learner.home');
    }
}
