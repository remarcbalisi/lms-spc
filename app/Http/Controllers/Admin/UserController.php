<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\RoleUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function home(){
        return view('admin.home');
    }

    public function create(){
        return view('admin.user.create')->with([
            'roles' => Role::get()
        ]);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'fname' => 'required|max:45',
            'mname' => 'required|max:45',
            'lname' => 'required|max:45',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $new_user = new User;
        $new_user->fname = $request->input('fname');
        $new_user->mname = $request->input('mname');
        $new_user->lname = $request->input('lname');
        $new_user->email = $request->input('email');
        $new_user->password = Hash::make($request->input('password'));
        $new_user->save();

        $new_role_user = new RoleUser;
        $new_role_user->user_id = $new_user->id;
        $new_role_user->role_id = $request->input('role');
        $new_role_user->save();

        return redirect()->back()->with([
            'success_msg' => 'Successfully added ' .$new_user->fname
        ]);
    }
}
