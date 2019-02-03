<?php

namespace App\Http\Controllers\Admin;

use App\AcademicYear;
use App\AcademicYearSemester;
use App\Semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SemesterController extends Controller
{
    public function create(){
        return view('admin.semester.create');
    }

    public function add_semester_to_ay(){
        return view('admin.semester.add_semester_to_ay')->with([
            "academic_years" => AcademicYear::get(),
            "semesters" => Semester::get(),
        ]);
    }

    public function store_semester_to_ay(Request $request){
        $request->validate([
            'academic_year_id' => 'required',
            'semester_id' => 'required',
        ]);

        if( $academic_year_semester = AcademicYearSemester::where(['academic_year_id'=>$request->input('academic_year_id'), 'semester_id'=>$request->input('semester_id')])->first() ){
            return redirect()->back()->withErrors([
                'already_exist' => "This relation already exist!",
            ]);
        }

        $new_academic_year_semester = new AcademicYearSemester;
        $new_academic_year_semester->academic_year_id = $request->input('academic_year_id');
        $new_academic_year_semester->semester_id = $request->input('semester_id');
        $new_academic_year_semester->save();

        return redirect()->back()->with([
            "success_msg" => "Successfully added!"
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'term' => 'required|unique:semester|max:20',
        ]);

        $new_semester = new Semester;
        $new_semester->term = $request->input('term');
        $new_semester->slug = strtolower(str_replace(" ", "-", $request->input('term')));
        $new_semester->save();

        return redirect()->back()->with([
            'success_msg' => "Successfully added " . $new_semester->term . " Semester."
        ]);
    }
}
