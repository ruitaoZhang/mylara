<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function createLoginRecord()
    {
        $data = [
            'user_id' => '88',
            'ip_address' => '88.88.88.86'
        ];

        Login::create($data);

//        $login = Login::find(12);
//        $login->ip_address = '4.4.48.48';
//        $login->save();

//        $login = Login::where('id', 11)->first();
//        $login->delete();

    }
}
