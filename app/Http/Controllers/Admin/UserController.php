<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();;

class UserController extends Controller
{
    //
    public function show_user()
    {
        $show_user = User::orderBy('id','DESC')->get();
        $manager_user = view('admin.all_user')->with('show_user', $show_user);
        return view('admin_layout')->with('admin.all_user', $manager_user);
    }

    public function edit_user($user_id)
    {
        $edit_user = User::find($user_id);
        $manager_user = view('admin.edit_user')->with('edit_user', $edit_user);

        return view('admin_layout')->with('admin.edit_user',$manager_user);
    }

    public function update_user(Request $request,$user_id)
    {
        $data = $request->all();
        $user =User::find($user_id);
        $user->name = $data['name'];
        $user->phone = $data['phone'];
        $user->email = $data['email'];
        $user->status = $data['status'];
        $user->save();

        Session::put('message','Update User Thành Công!');
        return Redirect::to('list-user');
    }

    public function delete_user($user_id)
    {
        # code...
        DB::table('users')->where('id',$user_id)->delete();
        Session::put('message','Xóa user thành công!');
        return Redirect::to('list-user');
    }
}
