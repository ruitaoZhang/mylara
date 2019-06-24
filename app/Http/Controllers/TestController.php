<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Zrt\Avatar\Facades\Avatar;

class TestController extends Controller
{
    //测试请求处理器
    public function testByeController(){
//        $say = new Saying();
//        $say('zrt');
    }

    public function useAvatar(){
//        Avatar::output (' 赵 ','zhao.png');
        app('avatar')->output(' 赵 ','zhao.png');
    }

}
