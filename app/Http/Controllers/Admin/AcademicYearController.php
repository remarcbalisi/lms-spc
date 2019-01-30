<?php

namespace App\Http\Controllers\Admin;

use App\AcademicYear;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AcademicYearController extends Controller
{
    public function create(){
        return view('admin.academic_year.create');
    }

    public function store(Request $request){
        $new_academic_year = new AcademicYear;
        $new_academic_year->start = $request->input('start_year');
        $new_academic_year->end = $request->input('end_year');
        $new_academic_year->save();
        return redirect()->back()->with([
            'success_msg' => 'Academic year ' . $new_academic_year->start . ' - ' . $new_academic_year->end . ' Successfully added'
        ]);
    }
}
