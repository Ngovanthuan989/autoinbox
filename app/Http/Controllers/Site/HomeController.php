<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $user = Auth::user();
        if($user->token){
            return view('site.home.dashboard');
        }
        return view('site.home.connect_facebook');
    }

    public function connect(){
        return view('site.home.connect_facebook');
    }
}
