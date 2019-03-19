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

    //2019-03-18

    /**
     * date_isodate_set(object,year,week,day);
     * 函数根据 ISO 8601 标准设置日期，使用周和天的偏移量（而不是使用一个具体的日期）
     */
    public function testDateIsodateSet(){
        $date=date_create();
        //设置 2019 年第 7 周的 ISO 日期：
        date_isodate_set($date,2019,7, 2);
        echo date_format($date,"Y-m-d");
        //输出：2019-02-12
    }

    /**
     * date_modify(object,modify);
     * 函数修改时间戳
     * object 	必需。规定由 date_create() 返回的 DateTime 对象
     * modify 	必需。规定日期/时间字符串。
     *
     */
    public function testDateModify(){
        $date=date_create("2016-09-25");
        date_modify($date,"+4 days");
        echo date_format($date,"Y-m-d");
        //输出：2016-09-29

    }

    /**
     * date_offset_get(object) 函数返回时区偏移
     * object 	必需。规定由 date_create() 返回的 DateTime 对象。
     */
    public function testDateOffsetGet(){
        $winter=date_create("2016-10-15",timezone_open("America/New_York"));
        $summer=date_create("2016-01-28",timezone_open("America/New_York"));

        echo date_offset_get($winter) . " 秒。<br />";
        echo date_offset_get($summer) . " 秒。";
        //输出：
        //-14400 秒。
        //-18000 秒。
    }

    /**
     * date_parse_from_format() 函数根据指定的格式返回包含指定日期信息的关联数组
     */
    public function testDateParseFromFormat(){
        print_r(date_parse_from_format("mmddyyyy","05122013"));
        //输出
        //Array ( [year] => [month] => 12 [day] => 13 [hour] => [minute] => [second] => [fraction] => [warning_count] => 0 [warnings] => Array ( ) [error_count] => 1 [errors] => Array ( [8] => Data missing ) [is_localtime] => )
    }

    /**
     * date_parse(date) 函数返回包含指定日期的详细信息的关联数组。
     * date 	必需。规定日期（strtotime() 接受的格式）。
     */
    public function testDateParse(){
        print_r(date_parse("2016-09-25 10:45:30.5"));
        //输出：Array ( [year] => 2016 [month] => 9 [day] => 25 [hour] => 10 [minute] => 45 [second] => 30 [fraction] => 0.5 [warning_count] => 0 [warnings] => Array ( ) [error_count] => 0 [errors] => Array ( ) [is_localtime] => )

    }


    //2019-03-19

    /**
     * date_sub(object,interval);
     * date_sub() 函数从指定日期减去日、月、年、时、分和秒。
     * object 	必需。规定由 date_create() 返回的 DateTime 对象
     * interval 	必需。规定 DateInterval 对象
     */
    public function testDateSub(){
        $date=date_create("2016-09-29");
        date_sub($date,date_interval_create_from_date_string("4 days"));
        echo date_format($date,"Y-m-d");
        //输出：2016-09-25
    }

    /**
     * date_sun_info(timestamp,latitude,longitude);
     * date_sun_info() 函数返回包含有关指定日期与地点的日出/日落和黄昏开始/黄昏结束的信息的数组
     */
    public function testDateSunInfo(){
        $sun_info=date_sun_info(strtotime("2016-01-01"),31.2283,121.4755);
        foreach ($sun_info as $key=>$val)
        {
            echo "$key: " . date("H:i:s",$val) . "<br>";
        }
        //输出
        //sunrise: 06:52:34
        //sunset: 17:01:56
        //transit: 11:57:15
        //civil_twilight_begin: 06:26:00
        //civil_twilight_end: 17:28:30
        //nautical_twilight_begin: 05:55:49
        //nautical_twilight_end: 17:58:41
        //astronomical_twilight_begin: 05:26:16
        //astronomical_twilight_end: 18:28:14
    }

    /**
     * date_sunrise(timestamp,format,latitude,longitude,zenith,gmtoffset);
     * date_sunrise() 函数返回指定日期与地点的日出时间。
     */
    public function testDateSunrise(){
        // 上海，中国：
        // 维度：北纬 31.22 ，经度：西经 121.47
        // 天顶 ~= 90，偏移：+8 GMT

        echo("上海，中国：日期：" . date("D M d Y"));
        echo("<br>日出时间：");
        echo(date_sunrise(time(),SUNFUNCS_RET_STRING,31.22,121.47,90,8));
        //输出：上海，中国：日期：Tue Mar 19 2019
        //日出时间：06:02

    }

    /**
     * date_sunset() 函数返回指定日期与地点的日落时间。
     */
    public function testDateSunset(){
        // 上海，中国：
        // 维度：北纬 31.22 ，经度：西经 121.47
        // 天顶 ~= 90，偏移：+8 GMT

        echo("上海，中国：日期：" . date("D M d Y"));
        echo("<br>日出时间：");
        echo(date_sunset(time(),SUNFUNCS_RET_STRING,31.22,121.47,90,8));
        //输出：上海，中国：日期：Tue Mar 19 2019
        //日出时间：18:01
    }

    /**
     * date_time_set(object,hour,minute,second);
     * date_time_set() 函数用于设置时间。
     */
    public function testDateTimeSet(){
        $date=date_create("2016-09-25");
        date_time_set($date,12,36);
        echo date_format($date,"Y-m-d H:i:s");
        //输出：2016-09-25 12:36:00
    }

    /**
     * date_timestamp_get(object);
     * 返回今天的日期和时间的 Unix 时间戳
     */
    public function testDateTimestampGet(){
        $date=date_create();
        echo date_timestamp_get($date);
        //输出：1552998894
    }
}
