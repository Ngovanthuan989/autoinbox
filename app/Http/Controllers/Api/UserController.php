<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    public function update(Request $request){
        try {
            //code...
            $user = User::where('id', $request['user_id'])->update([
                'token' => $request['utk'],
                'uck' => $request['uck'],
                'facebook_id' => $request['fid'],
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Cập nhật thành công'
            ]);
        } catch (\Exception $e) {
            //throw $th;
            return response()->json([
                'status' => 'error',
                'message' => 'Cập nhật không thành công'
            ]);
        }
    }
}
