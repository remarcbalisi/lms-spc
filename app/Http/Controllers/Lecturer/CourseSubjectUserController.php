<?php

namespace App\Http\Controllers\Lecturer;

use App\CourseSubjectUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CourseSubjectUserController extends Controller
{
    public function my_list(){
        return view('lecturer.classes.list')->with([
            'classes' => CourseSubjectUser::where([
                'user_id' => Auth::user()->id
            ])->get(),
        ]);
    }
}
