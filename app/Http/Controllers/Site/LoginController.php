<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Login\RegisterRequest;

class LoginController extends Controller
{
    public function login(Request $request){
<<<<<<< HEAD
        $user = User::where('email', $request['email'])
        ->first();
        if($user){
            if (Hash::check($request['password'], $user->password)) {
                Auth::loginUsingId($user->id, true);

                return redirect('dashboard');
            }
        }
        
        return redirect('/')->with('error-login', 'Email Hoặc mật khẩu không chính xác!');
=======

>>>>>>> dcaf6e5a2d4cfefce7bb1f1b5acf5dffbc3b11ff
    }

    public function register(RegisterRequest $request){
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => Hash::make($request['name']),
        ];

        $user = User::insertGetId($data);    

        Auth::loginUsingId($user, true);

        return redirect('dashboard');
    }
}
