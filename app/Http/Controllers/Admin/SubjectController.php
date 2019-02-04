<?php

namespace App\Http\Controllers\Admin;

use App\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class SubjectController extends Controller
{
    public function create(){
        return view('admin.subject.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|unique:subject|max:100',
            'code' => 'required|unique:subject|max:20',
            'description' => 'required',
            'max_student' => 'required',
        ]);

        $new_subject = new Subject;
        $new_subject->title = $request->input('title');
        $new_subject->code = $request->input('code');
        $new_subject->description = $request->input('description');
        if($request->hasFile('img')){
            $image = $request->file('img');
            $extension = $request->img->extension();
            $filename = 'subject_' . time() . '.' . $extension;
            Image::make($image)->save( storage_path('app/public/subject/' . $filename ) );
            $new_subject->img = 'subject/' . $filename;
        };
        $new_subject->is_lab = ($request->input('is_lab') == 1) ? true : false;
        $new_subject->max_student = $request->input('max_student');
        $new_subject->save();

        return redirect()->back()->with([
            'success_msg' => 'Successfully added ' . $new_subject->title,
        ]);
    }
}
