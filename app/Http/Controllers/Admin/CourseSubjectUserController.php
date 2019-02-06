<?php

namespace App\Http\Controllers\Admin;

use App\CourseSubject;
use App\CourseSubjectUser;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseSubjectUserController extends Controller
{
    public function enroll(){
        return view('admin.enroll_student.enroll')->with([
            'students' => Role::where('id', 3)->first()->role_users()->get(),
            'course_subjects' => CourseSubject::get(),
        ]);
    }

    public function add_lecturer(){
        return view('admin.course_subject_user.add_lecturer_to_course')->with([
            'lecturers' => Role::where('id', 2)->first()->role_users()->get(),
            'course_subjects' => CourseSubject::get(),
        ]);
    }

    public function store_enroll(Request $request){
        $request->validate([
            'user_id' => 'required',
            'course_subject_id' => 'required',
        ]);

        $check_if_already_enrolled = CourseSubjectUser::where([
            'user_id' => $request->input('user_id'),
            'course_subject_id' => $request->input('course_subject_id'),
        ])->first();

        if( $check_if_already_enrolled ){
            return redirect()->back()->withErrors([
                'exist' => "This student is already enrolled."
            ]);
        }

        $new_enroll = new CourseSubjectUser;
        $new_enroll->user_id = $request->input('user_id');
        $new_enroll->course_subject_id = $request->input('course_subject_id');
        $new_enroll->is_activated = true;
        $new_enroll->save();

        return redirect()->back()->with([
            'success_msg' => "Successfully enrolled!"
        ]);
    }

    public function store_add_lecturer(Request $request){
        $request->validate([
            'user_id' => 'required',
            'course_subject_id' => 'required',
        ]);

        $check_if_already_enrolled = CourseSubjectUser::where([
            'user_id' => $request->input('user_id'),
            'course_subject_id' => $request->input('course_subject_id'),
        ])->first();

        if( $check_if_already_enrolled ){
            return redirect()->back()->withErrors([
                'exist' => "This lecturer is already in this class."
            ]);
        }

        $new_enroll = new CourseSubjectUser;
        $new_enroll->user_id = $request->input('user_id');
        $new_enroll->course_subject_id = $request->input('course_subject_id');
        $new_enroll->is_activated = true;
        $new_enroll->save();

        return redirect()->back()->with([
            'success_msg' => "Successfully enrolled!"
        ]);
    }

    public function students_list($course_subject_user_id){
        return view('admin.classes.students')->with([
            'students' => CourseSubjectUser::where('id', $course_subject_user_id)->get(),
        ]);
    }
}
