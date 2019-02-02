<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class CourseController extends Controller
{
    public function create(){
        return view('admin.course.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|unique:course|max:100',
            'code' => 'required|unique:course|max:20',
            'description' => 'required',
        ]);
        $new_course = new Course;
        $new_course->title = $request->input('title');
        $new_course->code = $request->input('code');
        $new_course->description = $request->input('description');
        if($request->hasFile('img')){
            $image = $request->file('img');
            $extension = $request->img->extension();
            $filename = 'course_' . time() . '.' . $extension;
            Image::make($image)->save( storage_path('/app/public/course/' . $filename ) );
            $new_course->img = 'course/' . $filename;
        };
        $new_course->save();
        return redirect()->back()->with([
            'success_msg' => 'Successfully added ' . $new_course->title
        ]);
    }
}
