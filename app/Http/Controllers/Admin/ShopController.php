<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Shop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();;

class ShopController extends Controller
{
    public function show_shop()
    {
        $show_shop = Shop::orderBy('id','DESC')->get();
        $manager_shop = view('admin.all_shop')->with('show_shop', $show_shop);
        return view('admin_layout')->with('admin.all_shop', $manager_shop);
    }

    public function edit_shop($shop_id)
    {
        $edit_shop = Shop::find($shop_id);
        $manager_shop = view('admin.edit_shop')->with('edit_shop', $edit_shop);

        return view('admin_layout')->with('admin.edit_shop',$manager_shop);
    }
    public function update_shop(Request $request,$shop_id)
    {
        $data = $request->all();
        $shop =Shop::find($shop_id);
        $shop->name = $data['name'];
        $shop->description = $data['description'];

        $shop->save();

        Session::put('message','Update Shop Thành Công!');
        return Redirect::to('list-shop');
    }

    public function delete_shop($shop_id)
    {
        DB::table('shops')->where('id',$shop_id)->delete();
        Session::put('message','Xóa Shop thành công!');
        return Redirect::to('list-shop');
    }
}
