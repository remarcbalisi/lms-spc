<?php

namespace App\Http\Controllers\Lecturer;

use App\CourseSubject;
use App\CourseSubjectUser;
use App\PostType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CourseSubjectController extends Controller
{
    public function view($course_subject_id){
        return view('lecturer.classes.view')->with([
            "course_subject" => CourseSubject::where("id", $course_subject_id)->first(),
            "course_subject_user" => CourseSubjectUser::where([
                "user_id" => Auth::user()->id,
                "course_subject_id" => $course_subject_id,
            ])->first(),
            "post_types" => PostType::get(),
        ]);
    }

    public function conference_room() {
        return view('lecturer.classes.conference_room');
    }
}
