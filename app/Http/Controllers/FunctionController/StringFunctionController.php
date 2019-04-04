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

    //2019-04-04

    /**
     * chr() 函数从指定的 ASCII 值返回字符。
     * ASCII 值可被指定为十进制值、八进制值或十六进制值。八进制值被定义为带前置 0，而十六进制值被定义为带前置 0x
     */
    public function testChr(){
        echo chr(67). "<br>"; // 十进制
        echo chr(061) . "<br>"; // 八进制值
        echo chr(0x61) . "<br>"; // 十六进制值
        //输出：C
        //1
        //a
    }

    /**
     * chunk_split(string,length,end)
     *  string 	必需。规定要分割的字符串。
        length 	可选。数字值，定义字符串块的长度。默认是 76。
        end 	可选。字符串值，定义在每个字符串块末端放置的内容。默认是 \r\n。
     *  函数把字符串分割为一连串更小的部分。
     */
    public function testChunkSplit(){
        $str = 'iamzhangruitao';
        echo chunk_split($str, 1);
        echo chunk_split($str, 1, '.');
        //输出：i.a.m.z.h.a.n.g.r.u.i.t.a.o.

    }

    /**
     * convert_uudecode(string)
     * string 	必需。规定要解码的 uuencode 编码的字符串。
     * convert_uudecode() 函数对 uuencode 编码的字符串进行解码。
     */
    public function testConvertUudecode(){
        $str = ",2&5L;&\@=V]R;&0A `";
        echo convert_uudecode($str)."<br/>";
        //输出：Hello world!

        $str = 'i am zrt';
        $enCodeStr = convert_uuencode($str);
        echo $str."<br/>";
        echo "编码后：".$enCodeStr;
        echo "<br/>";
        $deCodeStr = convert_uudecode($enCodeStr);
        echo "解码后：".$deCodeStr."<br/>";

    }

    /**
     * count_chars(string,mode)
     * mode
        可选。规定返回模式。默认是 0。以下是不同的返回模式：
            0 - 数组，ASCII 值为键名，出现的次数为键值
            1 - 数组，ASCII 值为键名，出现的次数为键值，只列出出现次数大于 0 的值
            2 - 数组，ASCII 值为键名，出现的次数为键值，只列出出现次数等于 0 的值
            3 - 字符串，带有所有使用过的不同的字符
            4 - 字符串，带有所有未使用过的不同的字符
     * count_chars() 函数返回字符串中所用字符的信息
     * （例如，ASCII 字符在字符串中出现的次数，或者某个字符是否已经在字符串中使用过）。
     */
    public function testCountChar(){
        $str = "hello World";
        echo count_chars($str,3);
        echo "<br/>";
        //输出：Wdehlor

        $str = "PHP is pretty fun!!";
        $strArray = count_chars($str,1);

        foreach ($strArray as $key=>$value){
            echo "字符 <b>'".chr($key)."'</b> 被找到 $value 次。<br>";
        }

        //输出：
        //字符 ' ' 被找到 3 次。
        //字符 '!' 被找到 2 次。
        //字符 'H' 被找到 1 次。
        //字符 'P' 被找到 2 次。
        //字符 'e' 被找到 1 次。
        //字符 'f' 被找到 1 次。
        //字符 'i' 被找到 1 次。
        //字符 'n' 被找到 1 次。
        //字符 'p' 被找到 1 次。
        //字符 'r' 被找到 1 次。
        //字符 's' 被找到 1 次。
        //字符 't' 被找到 2 次。
        //字符 'u' 被找到 1 次。
        //字符 'y' 被找到 1 次。
    }
}
