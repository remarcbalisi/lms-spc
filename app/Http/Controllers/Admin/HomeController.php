<?php

namespace App\Http\Controllers\Admin;

use App\AcademicYearSemester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function dashboard(){
        return view('admin.home')->with([
            'academic_year_semesters' => AcademicYearSemester::get(),
        ]);
    }
}
