<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();;

class OrderController extends Controller
{
    public function show_order()
    {
        $show_order = DB::table('orders')
        ->join('users','users.id','=','orders.user_id')
        ->orderby('orders.id','desc')->get();
        $manager_order = view('admin.all_order')->with('show_order', $show_order);
        return view('admin_layout')->with('admin.all_order', $manager_order);
    }
}
