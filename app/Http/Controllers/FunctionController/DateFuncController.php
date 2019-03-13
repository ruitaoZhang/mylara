<?php

namespace App\Http\Controllers\FunctionController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DateFuncController extends Controller
{
    //2019-03-13
    /**
     * checkdate(month,day,year);
     * 函数用于验证格利高里日期
     */
    public function testCheckDate(){
        var_dump(checkdate(12,31,-400));
        echo "<br>";
        var_dump(checkdate(2,29,2003));
        echo "<br>";
        var_dump(checkdate(2,29,2004));
        echo "<br>";
        var_dump(checkdate(2,28,2019));

        //输出：
        //bool(false)
        //bool(false)
        //bool(true)
        //bool(true)
    }

    /**
     * date_add(object,interval);
     * 函数向某个日期添加日、月、年、时、分和秒。
     * interval 	必需。规定 DateInterval 对象
     */
    public function testDateAdd(){
        $date=date_create("1980-10-15");
        date_add($date,date_interval_create_from_date_string("100 days"));
        echo date_format($date,"Y-m-d");
        //输出：1981-01-23
    }

    /**
     * date_create_from_format(format,time,timezone);
     * 函数返回根据指定格式进行格式化的新的 DateTime 对象
     * formatd - 一个月中的第几天，带前导零
        j - 一个月中的第几天，不带前导零
        D - 一周中的某天（Mon - Sun）
        I - 一周中的某天（Monday - Sunday）
        S - 一个月中的第几天的英语后缀（st, nd, rd, th）
        F - 月份名称（January - December）
        M - 月份名称（Jan - Dec）
        m - 月份（01 - 12）
        n - 月份（1 - 12）
        Y - 年份（例如 2013）
        y - 年份（例如 13）a 和 A - am 或 pm
        g - 12 小时制，不带前导零
        h - 12 小时制，带前导零
        G - 24 小时制，不带前导零
        H - 24 小时制，带前导零
        i - 分，带前导零
        s - 秒，带前导零
        u - 微秒（多达六个数字）
        e、O、P 和 T - 时区标识符
        U - 自 Unix 纪元以来经过的秒数
        （空格）
        # - 下列分隔符之一：;、:、/、.、,、-、(、)
        ? - 一个随机字节
         * - 随机字节直到下一个分隔/数字
        ! - 重置所有字段到 Unix 纪元
        | - 如果所有字段都还没被解析，则重置所有字段到 Unix 纪元
        + - 如果存在，字符串中的尾随数据将导致警告，不是错误
     * time 规定日期/时间字符串。NULL 指示当前的日期/时间。
     * timezone 规定 time 的时区。默认为当前时区
     */
    public function testDateCreateFromFormat(){
        $date=date_create_from_format("j-M-Y","25-Sep-2016");
        print_r($date);
        //输出：DateTime Object ( [date] => 2016-09-25 20:30:43.000000 [timezone_type] => 3 [timezone] => Asia/Shanghai )
    }

    /**
     * date_create(time,timezone);
     * 函数返回新的 DateTime 对象
     */
    public function testDateCreate(){
        $date=date_create("2016-09-25");
        echo date_format($date,"Y/m/d");
        //输出：2016/09/25

        $date=date_create("2013-03-15 23:40:00",timezone_open("Europe/Oslo"));
        echo date_format($date,"Y/m/d H:iP");
        //输出：2013/03/15 23:40+01:00
    }

    /**
     * date_date_set(object,year,month,day);
     * 函数设置新的日期。
     */
    public function testDateDateSet(){
        $date=date_create();//当前时间
        date_date_set($date,2020,10,15);
        echo date_format($date,"Y/m/d");
        //输出：2020/10/15
    }
}
