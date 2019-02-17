<?php

namespace App\Http\Controllers\Learner;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CommentController extends Controller
{
    public function store(Request $request, $post_id){
        $new_comment = new Comment;
        $new_comment->body = $request->input("body");
        $new_comment->post_id = $post_id;
        $new_comment->commented_by = Auth::user()->id;
        $new_comment->save();
        return redirect()->back();
    }
}
