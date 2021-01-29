<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FanpageController extends Controller
{
    function __construct()
    {
		header("Access-Control-Allow-Credentials: true");
		header('content-type: text/html; charset=utf-8');
		header('x-access-token: *');
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');

    }

    public function decryptData(Request $request){
        dd($request->all());
    }
}
