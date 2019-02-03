<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{
    public function create(){
        return view('admin.section.create')->with([
            "courses" => Course::get(),
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:section|max:45',
            'course_id' => 'required'
        ]);

        if( $section = Section::where(['name' => $request->input('name'), 'course_id' => $request->input('course_id')])->first() ){
            return redirect()->back()->withErrors([
                'exist' => "Section " . $section->name . " Already exist"
            ]);
        }

        $new_section = new Section;
        $new_section->name = $request->input('name');
        $new_section->slug = strtolower(str_replace(" ", "-", $request->input('name')));
        $new_section->course_id = $request->input('course_id');
        $new_section->save();

        return redirect()->back()->with([
            'success_msg' => 'Successfully added ' . $new_section->name . ' section.'
        ]);
    }
}
