<?php

namespace App\Http\Controllers\Admin;

use App\AcademicYearSemester;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class CourseController extends Controller
{
    public function create(){
        return view('admin.course.create')->with([
            "academic_year_semesters" => AcademicYearSemester::get(),
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|unique:course|max:100',
            'code' => 'required|unique:course|max:20',
            'description' => 'required',
            'academic_year_semester_id' => 'required',
        ]);
        $new_course = new Course;
        $new_course->title = $request->input('title');
        $new_course->code = $request->input('code');
        $new_course->description = $request->input('description');
        $new_course->academic_year_semester_id = $request->input('academic_year_semester_id');
        if($request->hasFile('img')){
            $image = $request->file('img');
            $extension = $request->img->extension();
            $filename = 'course_' . time() . '.' . $extension;
            Image::make($image)->save( storage_path('app/public/course/' . $filename ) );
            $new_course->img = 'course/' . $filename;
        };
        $new_course->save();
        return redirect()->back()->with([
            'success_msg' => 'Successfully added ' . $new_course->title
        ]);
    }

    public function courses_by_semester_ay($academic_year_semester_id){
        return view('admin.course.courses_by_semester_ay')->with([
            'courses' => AcademicYearSemester::where('id', $academic_year_semester_id)->first()->courses()->get(),
            'academic_year_semester' => AcademicYearSemester::where('id', $academic_year_semester_id)->first(),
        ]);
    }
}
