<?php

namespace App\Http\Controllers\Admin;

use App\Semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SemesterController extends Controller
{
    public function create(){
        return view('admin.semester.create');
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
