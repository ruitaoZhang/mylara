<?php

namespace App\Http\Controllers\Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function testSetSession(Request $request){
        $request->session()->put('mkey1', 'mvalue1');
//        Session::save();//dd()前如果不save，session 没有保存成功
//        echo $request->session()->get('mkey');
//        dd($request->session()->regenerate());
        session(['mkey2' => 'mvalue2']);

        $request->session()->put('mArr', ['k1' => 'v1', 'k2' => 'v2']);
    }

    public function testGetSessionVal(Request $request){
        echo $request->session()->get('mkey1')."<br/>";
        echo session('mkey1')."<br/>";
        echo session('mkey2')."<br/>";
        echo session('mkey3', 'defu3')."<br/>";//设置默认值

        var_dump($request->session()->all());//获取session所有值

        //判断 session 是否存某个值
        if ($request->session()->has('mkey2')){
            echo "存在<br/>";
        }
        //将一个新的值加入到数组中
        $request->session()->push('mArr.k11', 'developers');
        $request->session()->push('mArr.k11', 'developers1');

        dd(session('mArr'));
    }

    public function testDelSession(Request $request){
        $value = $request->session()->pull('mkey2', 'default');
        echo $value;
    }
}
