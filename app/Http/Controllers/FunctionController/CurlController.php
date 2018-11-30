<?php

namespace App\Http\Controllers\FunctionController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CurlController extends Controller
{
    public function catchPageData(){
        echo 'dd';
        header("Content-type: text/html; charset=utf-8");
        $ch = curl_init();//初始化

        /*============开始设置curl各种选项================*/
        curl_setopt($ch, CURLOPT_URL, "http://image.baidu.com/search/index?tn=baiduimage&ps=1&ct=201326592&lm=-1&cl=2&nc=1&ie=utf-8&word=PHP%E6%AD%A3%E5%88%99%E5%8C%B9%E9%85%8D");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


        $html = curl_exec($ch);//执行句柄，获取返回内容
        curl_close($ch);//释放句柄
        $isMatched = preg_match("/<img>(.*)<\/title>/", $html, $matches);
        dd($matches);
        echo $html;
    }
}
