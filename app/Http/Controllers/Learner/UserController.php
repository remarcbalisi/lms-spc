<?php

namespace App\Http\Controllers\Learner;

use App\AssessmentType;
use App\CourseSubjectUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function home(){
        return view('learner.home');
    }

    public function view_assessments($course_subject_user_id) {
        return view('learner.assessment.view')->with([
            'assessments' => CourseSubjectUser::where('id', $course_subject_user_id)->first()->assessments()->get(),
            'assessment_types' => AssessmentType::get(),
        ]);
    }

}
