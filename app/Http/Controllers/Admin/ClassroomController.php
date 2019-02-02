<?php

namespace App\Http\Controllers\Admin;

use App\AcademicYear;
use App\Classroom;
use App\Course;
use App\Section;
use App\Semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassroomController extends Controller
{
    public function create(){
        return view('admin.classroom.create')->with([
            'academic_years' => AcademicYear::get(),
            'semesters' => Semester::get(),
            'courses' => Course::get(),
            'sections' => Section::get()
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'academic_year' => 'required',
            'semester' => 'required',
            'course' => 'required',
            'section' => 'required',
        ]);

        $check_classroom_exist = Classroom::where([
            'academic_year_id' => $request->input('academic_year'),
            'semester_id' => $request->input('semester'),
            'course_id' => $request->input('course'),
            'section_id' => $request->input('section'),
        ])->first();
        
        if ( $check_classroom_exist ){
            return redirect()->back()->withErrors([
                'classroom_exist' => 'Classroom' . $check_classroom_exist->course->title . " already exist."
            ]);
        }

        $new_classroom = new Classroom;
        $new_classroom->academic_year_id = $request->input('academic_year');
        $new_classroom->semester_id = $request->input('semester');
        $new_classroom->course_id = $request->input('course');
        $new_classroom->section_id = $request->input('section');
        $new_classroom->save();

        return redirect()->back()->with([
            'success_msg' => 'Successfully added ' . $new_classroom->course->title . " classroom."
        ]);
    }
}
