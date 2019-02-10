<?php

namespace App\Http\Controllers\Lecturer;

use App\Multimedia;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class PostController extends Controller
{
    public function store(Request $request, $course_subject_user_id){

        $request->validate([
            "body" => "required",
            "post_type_id" => "required"
        ]);

        $new_post = new Post;
        $new_post->title = ( $request->input("title") ) ? $request->input("title") : null;
        $new_post->body = $request->input("body");
        $new_post->course_subject_user_id = $course_subject_user_id;
        $new_post->post_type_id = $request->input("post_type_id");
        $new_post->save();

        if($request->hasFile('file')){
            foreach( $request->file('file') as $file ){
                $extension = $file->extension() ? $file->extension() : "n/a";
                $path = $file->store('public/posts/files');
                $new_multimedia = new Multimedia;
                $new_multimedia->type = $extension;
                $new_multimedia->directory = $path;
                $new_multimedia->post_id = $new_post->id;
                $new_multimedia->save();
            }
        };


        return redirect()->back()->with([
            "success_msg" => "Successfully created Post!",
        ]);
    }
}
