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
}
