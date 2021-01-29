<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Fanpage extends Model
{
    protected $table = "fanpage";

    public static function getCountFanpage(){
        $userId = Auth::user()->id;

        return static::where('user_id', $userId)
        ->count();
    }
}
