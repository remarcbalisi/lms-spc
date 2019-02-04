<?php

namespace App\Http\Controllers\Admin;

use App\CourseSubject;
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
}
