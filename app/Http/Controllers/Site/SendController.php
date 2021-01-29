<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SendController extends Controller
{
    public function send(Request $request){
        $data = Crypt::encrypt($request->all());
        $link = "https://m.facebook.com?client=autoinbox&data=".$data;

        return $link;
    }
}
