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

    public function view_class_students($course_subject_id, $lecturer_id){
        $lecturer = CourseSubjectUser::where([
            'user_id' => $lecturer_id,
            'course_subject_id' => $course_subject_id,
        ])->first();

        $students = CourseSubjectUser::where([
            'course_subject_id' => $course_subject_id,
        ])->whereNotIn('user_id', [$lecturer_id])->get();

        return view('lecturer.classes.students_list')->with([
            'lecturer' => $lecturer,
            'students' => $students,
            'course_subject_id' => $course_subject_id,
        ]);

    }

}
