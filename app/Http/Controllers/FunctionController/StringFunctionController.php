<?php

namespace App\Http\Controllers\FunctionController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StringFunctionController extends Controller
{
    //2019-04-03
    /**
     * addcslashes(string,characters)
     * 函数返回在指定字符前添加反斜杠的字符串。
     * addcslashes() 函数对大小写敏感
     */
    public function testAddcslashes(){
        //在指定字符前加上【/】
        $str = addcslashes("A001 A002 A003","A");
        echo($str);
        //输出：\A001 \A002 \A003

        //向字符串中的某个范围内的字符添加反斜杠：
        $str = "Welcome to Shanghai!";
        echo $str."<br>";
        echo addcslashes($str,'A..Z')."<br>";
        echo addcslashes($str,'a..z')."<br>";
        echo addcslashes($str,'a..g');
        //输出：Welcome to Shanghai!
        //\Welcome to \Shanghai!
        //W\e\l\c\o\m\e \t\o S\h\a\n\g\h\a\i!
        //W\el\com\e to Sh\an\gh\ai!
    }

    /**
     * addslashes() 函数返回在预定义字符之前添加反斜杠的字符串。
     * 预定义字符是：
        单引号（'）
        双引号（"）
        反斜杠（\）
        NULL
     */
    public function testAddslashes(){
        $str = addslashes("i am 'z' tao");
        echo $str."<br/>";
        //输出：i am \'z\' tao
    }

    /**
     * bin2hex() 函数把 ASCII 字符的字符串转换为十六进制值。字符串可通过使用 pack() 函数再转换回去
     */
    public function testBin2hex(){

        $str = bin2hex("Shanghai");
        echo $str."<br/>";
        //输出：5368616e67686169

        //把一个字符串值从二进制转换为十六进制，再转换回去
        $str = "Shanghai";
        echo bin2hex($str) . "<br>";
        echo pack("H*",bin2hex($str)) . "<br>";

    }

    /**
     * chop(string,charlist)
     * 函数移除字符串右端的空白字符或其他预定义字符。
     * 如果 charlist 参数为空，则移除以下字符：
        "\0" - NULL
        "\t" - 制表符
        "\n" - 换行
        "\x0B" - 垂直制表符
        "\r" - 回车
        " " - 空格
     */
    public function testChop(){
        $str = 'hello world!';
        echo chop($str)."<br/>";
        echo chop($str, "world!")."<br/>";

    }
}
