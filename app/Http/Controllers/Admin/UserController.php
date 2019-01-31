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

    public function view($user_id){
        return view('admin.user.view')->with([
            'user' => User::find($user_id)
        ]);
    }

    public function list(){
        return view('admin.user.list')->with([
            'users' => User::get()
        ]);
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
            'role' => 'required',
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

    public function edit($user_id){
        return view('admin.user.edit')->with([
            'user' => User::find($user_id),
            'roles' => Role::get(),
        ]);
    }

    public function update(Request $request, $user_id){
        $validatedData = $request->validate([
            'fname' => 'required|max:45',
            'mname' => 'required|max:45',
            'lname' => 'required|max:45',
            'email' => 'required|email|unique:users,email,'.$user_id,
            'role' => 'required',
        ]);

        $user = User::find($user_id);
        $user->fname = $request->input('fname');
        $user->mname = $request->input('mname');
        $user->lname = $request->input('lname');
        $user->email = $request->input('email');
        if ( $request->input('password') != null ){
            $request->validate([
                'password' => 'required|confirmed',
            ]);
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        $role_user = RoleUser::where('user_id', '=', $user->id)->first();
        $role_user->role_id = $request->input('role');
        $role_user->save();

        return redirect()->back()->with([
            'success_msg' => 'Successfully updated ' .$user->fname
        ]);

    }

    public function delete(Request $request, $user_id){
        $user = User::find($user_id);
        $user->delete();
        return redirect()->back();
    }
}
