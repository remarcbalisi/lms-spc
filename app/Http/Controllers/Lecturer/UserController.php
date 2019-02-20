<?php

namespace App\Http\Controllers\Lecturer;

use App\Assessment;
use App\AssessmentType;
use App\CourseSubjectUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function home(){
        return view('lecturer.home');
    }

    public function add_assessment($course_subject_user_id) {
        return view('lecturer.user.add_assessment')->with([
            'course_subject_user' => CourseSubjectUser::where('id', $course_subject_user_id)->first(),
            'assessment_types' => AssessmentType::get(),
        ]);
    }

    public function store_assessment(Request $request, $course_subject_user_id) {
        $request->validate([
            'assessment_type' => 'required',
            'score' => 'required',
            'total_items' => 'required',
            'date_taken' => 'required'
        ]);

        $new_assessment = new Assessment;
        $new_assessment->score = $request->input('score');
        $new_assessment->date_taken = $request->input('date_taken');
        $new_assessment->assessment_type_id = $request->input('assessment_type');
        $new_assessment->course_subject_user_id = $course_subject_user_id;
        $new_assessment->total_items = $request->input('total_items');
        $new_assessment->save();

        return redirect()->back()->with([
            'success_msg' => 'Assessment Successfully added',
        ]);
    }
}
