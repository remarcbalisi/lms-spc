<?php

namespace App\Http\Controllers\Admin;

use App\College;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollegeController extends Controller
{
    public  function create(){
        return view('admin.college.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:college|max:60',
        ]);

        $new_college = new College;
        $new_college->name = $request->input('name');
        $new_college->slug = strtolower(str_replace(" ", "-", $request->input('name')));
        $new_college->save();

        return redirect()->back()->with([
            'success_msg' => 'Successfully added ' . $new_college->name,
        ]);
    }
}
