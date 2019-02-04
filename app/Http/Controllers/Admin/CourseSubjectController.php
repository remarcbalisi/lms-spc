<?php

namespace App\Http\Controllers\Admin;

use App\AcademicYearSemester;
use App\Course;
use App\CourseSubject;
use App\Section;
use App\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseSubjectController extends Controller
{
    public function create(){
        return view('admin.course_subject.create')->with([
            'academic_year_semesters' => AcademicYearSemester::get(),
            'courses' => Course::get(),
            'subjects' => Subject::get(),
            'sections' => Section::get(),
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'academic_year_semester_id' => 'required',
            'course_id' => 'required',
            'subject_id' => 'required',
            'section_id' => 'required',
        ]);

        $course_subject_exist = CourseSubject::where([
            'academic_year_semester_id' => $request->input('academic_year_id'),
            'course_id' => $request->input('course_id'),
            'subject_id' => $request->input('subject_id'),
            'section_id' => $request->input('section_id'),
        ])->first();

        if($course_subject_exist){
            return redirect()->back()->withErrors([
                'exist' => "This course is already created for this semester"
            ]);
        }

        $new_course_subject = new CourseSubject;
        $new_course_subject->academic_year_semester_id = $request->input('academic_year_semester_id');
        $new_course_subject->course_id = $request->input('course_id');
        $new_course_subject->subject_id = $request->input('subject_id');
        $new_course_subject->section_id = $request->input('section_id');

        $new_course_subject->save();

        return redirect()->back()->with([
            'success_msg' => "Successfull added!"
        ]);
    }
}
