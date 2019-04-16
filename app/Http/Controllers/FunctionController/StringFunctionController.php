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

    //2019-04-09
    /**
     * explode(separator,string,limit)
     * explode() 函数把字符串打散为数组。
     * separator 	必需。规定在哪里分割字符串。
       string 	必需。要分割的字符串。
     */
    public function testExplode(){
        $str = "Hello world. I love Shanghai!";
        print_r(explode(" ", $str));
        //输出：Array ( [0] => Hello [1] => world. [2] => I [3] => love [4] => Shanghai! )
    }

    /**
     * fprintf(stream,format,arg1,arg2,arg++)
     * 函数把格式化的字符串写入指定的输出流（例如：文件或数据库）
     * format
        %% - 返回一个百分号 %
        %b - 二进制数
        %c - ASCII 值对应的字符
        %d - 包含正负号的十进制数（负数、0、正数）
        %e - 使用小写的科学计数法（例如 1.2e+2）
        %E - 使用大写的科学计数法（例如 1.2E+2）
        %u - 不包含正负号的十进制数（大于等于 0）
        %f - 浮点数（本地设置）
        %F - 浮点数（非本地设置）
        %g - 较短的 %e 和 %f
        %G - 较短的 %E 和 %f
        %o - 八进制数
        %s - 字符串
        %x - 十六进制数（小写字母）
        %X - 十六进制数（大写字母）
     */
    public function testFprintf(){
        $number = 9;
        $str = "Beijing";
        $file = fopen("testFile/1.txt","w");
        echo fprintf($file,"There are %u million bicycles in %s.",$number,$str);
    }

    /**
     * hex2bin() 函数把十六进制值的字符串转换为 ASCII 字符
     */
    public function testHex2bin(){
        echo hex2bin("48656c6c6f20576f726c6421");
        //输出:Hello World!
    }

    //2019-04-15

    /**
     * implode(separator,array)
     * separator 	可选。规定数组元素之间放置的内容。默认是 ""（空字符串）。
       array 	必需。要组合为字符串的数组。
     * implode() 函数返回由数组元素组合成的字符串。
     * join() 函数是 implode() 函数的别名。
     */
    public function testImplode(){
        $arr = array('Hello','World!','I','love','Shanghai!');
        echo implode(" ",$arr);
        //输出：Hello World! I love Shanghai!

    }

    /**
     * lcfirst(string)
     * lcfirst() 函数把字符串中的首字符转换为小写。
     * 相关：
        strtolower() - 把字符串转换为小写
        strtoupper() - 把字符串转换为大写
        ucfirst() - 把字符串中的首字符转换为大写
        ucwords() - 把字符串中每个单词的首字符转换为大写
     */
    public function testLcfirst(){
        echo lcfirst("Hello world!");
        //输出：hello world!
    }

    /**
     * ltrim(string,charlist)
     * ltrim() 函数移除字符串左侧的空白字符或其他预定义字符。
     * 相关：
     * rtrim() - 移除字符串右侧的空白字符或其他预定义字符
     * trim() - 移除字符串两侧的空白字符或其他预定义字符
     */
    public function testLtrim(){
        $str = "Hello World!";
        echo $str . "<br>";
        echo ltrim($str,"Hello");
    }

    //2019-04-16

    /**
     * md5(string,raw)
     * string 	必需。规定要计算的字符串。
     * raw 可选。规定十六进制或二进制输出格式：
        TRUE - 原始 16 字符二进制格式
        FALSE - 默认。32 字符十六进制数
     * md5() 函数计算字符串的 MD5 散列
     */
    public function testMd5(){
        $str = 'iamtao';
        echo md5($str)."<br/>";
        //输出：a483de86c589088791b35d8d7e6aba7a
        $str1 = 'iamtao';
        echo md5($str1, true)."<br/>";
        //输出：��ކŉ���]�~j�z

    }

    /**
     * nl2br(string,xhtml)
     * string 	必需。规定要检查的字符串
     * xhtml
        可选。布尔值，表示是否使用兼容 XHTML 换行：

        TRUE- 默认。插入 <br />
        FALSE - 插入 <br>
     */
    public function testNl2br(){
        $str = "i am zrt \n hhhhh";
        echo nl2br($str);
        //输出：i am zrt
        //hhhhh
    }

    /**
     * number_format() 函数通过千位分组来格式化数字
     * number_format(number,decimals,decimalpoint,separator)
     * number 必需。要格式化的数字。
        如果未设置其他参数，则数字会被格式化为不带小数点且以逗号（,）作为千位分隔符。
     * decimals 	可选。规定多少个小数。如果设置了该参数，则使用点号（.）作为小数点来格式化数字。
     * decimalpoint 	可选。规定用作小数点的字符串。
     * separator 可选。规定用作千位分隔符的字符串。仅使用该参数的第一个字符。比如 "xxx" 仅输出 "x"。
        注释：如果设置了该参数，那么所有其他参数都是必需的
     */
    public function testNumberFormat(){
        echo number_format("5000000")."<br>";
        echo number_format("5000000",2)."<br>";
        echo number_format("5000000",2,",",".");
        //输出：5,000,000
        //5,000,000.00
        //5.000.000,00

        $num = 4999.9;
        $formattedNum = number_format($num)."<br>";
        echo $formattedNum;
        $formattedNum = number_format($num, 2);
        echo $formattedNum;
        //输出：5,000
        //4,999.90
    }
}
