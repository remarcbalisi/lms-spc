<?php

namespace App\Http\Controllers\Lecturer;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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


        return redirect()->back()->with([
            "success_msg" => "Successfully created Post!",
        ]);
    }
}
