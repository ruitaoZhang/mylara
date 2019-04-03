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
    public function testDateTimestampGet()
    {
        $date = date_create();
        echo date_timestamp_get($date);
        //输出：1552998894
    }
    //2019-03-14

    /**
     * date_default_timezone_get() 函数返回脚本中所有日期/时间函数使用的默认时区。
     */
    public function testDateDefaultTimezoneGet(){
        echo date_default_timezone_get();
        //输出：Asia/Shanghai

    }

    /**
     * date_default_timezone_set() 函数设置脚本中所有日期/时间函数使用的默认时区。
     */
    public function testDataDefaultTimezoneSet(){
        echo "当前时区".date_default_timezone_get();
        date_default_timezone_set('UTC');
        echo "<br/>设置后时区".date_default_timezone_get();
        //输出：
        //当前时区Asia/Shanghai
        //设置后时区UTC
    }

    /**
     * date_diff(datetime1,datetime2,absolute);
     * date_diff() 函数返回两个 DateTime 对象间的差值
     */
    public function testDateDiff(){
        $date1=date_create("1984-01-28");
        $date2=date_create("1980-10-15");
        $diff=date_diff($date1,$date2);
        echo $diff->format("%R%a days");
        //输出：-1200 days
    }

    /**
     * date_format(object,format);
     * 函数返回根据指定格式进行格式化的日期。
     */
    public function testDateFormat(){
        $date=date_create("2016-9-25");
        echo date_format($date,"Y/m/d H:i:s");
        //输出：2016/09/25 00:00:00
        $date=date_create("2016/09/25");
        echo date_format($date,"Y-m-d H:i:s");
        //输出：2016-09-25 00:00:00
    }

    /**
     * date_get_last_errors() 函数返回解析日期字符串时找到的警告/错误。
     */
    public function testDateGetLastErrors(){
        date_create("aecubdjpoi%&&/");
        print_r(date_get_last_errors());
        //输出：Array ( [warning_count] => 1
        // [warnings] => Array ( [6] => Double timezone specification )
        // [error_count] => 5
        // [errors] => Array ( [0] => The timezone could not be found in the database
        // [10] => Unexpected character
        // [11] => Unexpected character
        // [12] => Unexpected character
        // [13] => Unexpected character ) )
    }

    //2019-03-20
    /**
     * date_timestamp_set(object,unixtimestamp)
     * date_timestamp_set() 函数设置基于 Unix 时间戳的日期和时间
     * object 	必需。规定由 date_create() 返回的 DateTime 对象。本函数修改该对象。
     * unixtimestamp 	必需。规定代表日期的 Unix 时间戳。
     */
    public function testDateTimestampSet(){
        $date=date_create();
        date_timestamp_set($date,1472988263);
        echo date_format($date,"U = Y-m-d H:i:s");
        //输出：1472988263 = 2016-09-04 19:24:23
    }

    /**
     * date_timezone_get(object);
     * date_timezone_get() 函数返回给定 DateTime 对象的时区
     */
    public function testDateTimezoneGet(){
        $date=date_create(null,timezone_open("Europe/Paris"));
        $tz=date_timezone_get($date);
        echo timezone_name_get($tz);
        //输出：Europe/Paris
    }

    /**
     * date_timezone_set() 函数设置 DateTime 对象的时区
     *
     */
    public function testDateTimezoneSet(){
        $date=date_create("2016-09-25",timezone_open("Asia/Shanghai"));
        $tz = date_timezone_set($date, timezone_open("Europe/Paris"));
        echo date_format($date,"Y-m-d H:i:sP");
        echo date_format($tz,"Y-m-d H:i:sP");
        //输出：2016-09-24 18:00:00+02:00
        //2016-09-24 18:00:00+02:00
    }

    /**
     * date(format,timestamp)
     * format    必需。规定输出日期字符串的格式。可使用下列字符
        d - 一个月中的第几天（从 01 到 31）
        D - 星期几的文本表示（用三个字母表示）
        j - 一个月中的第几天，不带前导零（1 到 31）
        l（'L' 的小写形式）- 星期几的完整的文本表示
        N - 星期几的 ISO-8601 数字格式表示（1表示Monday[星期一]，7表示Sunday[星期日]）
        S - 一个月中的第几天的英语序数后缀（2 个字符：st、nd、rd 或 th。与 j 搭配使用）
        w - 星期几的数字表示（0 表示 Sunday[星期日]，6 表示 Saturday[星期六]）
        z - 一年中的第几天（从 0 到 365）
        W - 用 ISO-8601 数字格式表示一年中的星期数字（每周从 Monday[星期一]开始）
        F - 月份的完整的文本表示（January[一月份] 到 December[十二月份]）
        m - 月份的数字表示（从 01 到 12）
        M - 月份的短文本表示（用三个字母表示）
        n - 月份的数字表示，不带前导零（1 到 12）
        t - 给定月份中包含的天数
        L - 是否是闰年（如果是闰年则为 1，否则为 0）
        o - ISO-8601 标准下的年份数字
        Y - 年份的四位数表示
        y - 年份的两位数表示
        a - 小写形式表示：am 或 pm
        A - 大写形式表示：AM 或 PM
        B - Swatch Internet Time（000 到 999）
        g - 12 小时制，不带前导零（1 到 12）
        G - 24 小时制，不带前导零（0 到 23）
        h - 12 小时制，带前导零（01 到 12）
        H - 24 小时制，带前导零（00 到 23）
        i - 分，带前导零（00 到 59）
        s - 秒，带前导零（00 到 59）
        u - 微秒（PHP 5.2.2 中新增的）
        e - 时区标识符（例如：UTC、GMT、Atlantic/Azores）
        I（i 的大写形式）- 日期是否是在夏令时（如果是夏令时则为 1，否则为 0）
        O - 格林威治时间（GMT）的差值，单位是小时（实例：+0100）
        P - 格林威治时间（GMT）的差值，单位是 hours:minutes（PHP 5.1.3 中新增的）
        T - 时区的简写（实例：EST、MDT）
        Z - 以秒为单位的时区偏移量。UTC 以西时区的偏移量为负数（-43200 到 50400）
        c - ISO-8601 标准的日期（例如 2013-05-05T16:34:42+00:00）
        r - RFC 2822 格式的日期（例如 Fri, 12 Apr 2013 12:01:05 +0200）
        U - 自 Unix 纪元（January 1 1970 00:00:00 GMT）以来经过的秒数
     */
    public function testDate(){
        // 输出日
        echo date("l") . "<br>";

        // 输出日、日期、月、年、时间 AM 或 PM
        echo date("l jS \of F Y h:i:s A");
        //输出：Wednesday
        //Wednesday 20th of March 2019 01:11:33 PM
    }

    /**
     * getdate(timestamp);
     * getdate() 函数返回某个时间戳或者当前本地的日期/时间的日期/时间信息。
     */
    public function testGetDate(){
        print_r(getdate());
        //输出：Array (
        // [seconds] => 21
        // [minutes] => 15
        // [hours] => 13
        // [mday] => 20
        // [wday] => 3
        // [mon] => 3
        // [year] => 2019
        // [yday] => 78
        // [weekday] => Wednesday
        // [month] => March
        // [0] => 1553058921 )

        //返回带有与时间戳相关的信息的关联数组：
        //
        //    [seconds] - 秒
        //    [minutes] - 分
        //    [hours] - 小时
        //    [mday] - 一个月中的第几天
        //    [wday] - 一周中的某天
        //    [mon] - 月
        //    [year] - 年
        //    [yday] - 一年中的某天
        //    [weekday] - 星期几的名称
        //    [month] - 月份的名称
        //    [0] - 自 Unix 纪元以来经过的秒数
    }

    //2019-03-21

    /**
     * gettimeofday(return_float)
     * gettimeofday() 函数返回当前时间
     * return_float 	可选。当设置为 TRUE 时，返回浮点数，而不是数组。默认是 FALSE
     * 返回值：
        默认返回关联数组，带有如下数组键名：
        [sec] - Unix 纪元以来的秒
        [usec] - 微秒
        [minuteswest] - 格林尼治以西的分
        [dsttime] - 夏令时修正类型
     */
    public function testGettimeofdate(){
        // 输出 gettimeofday() 返回的数组
        print_r(gettimeofday());

        // 输出 gettimeofday() 返回的浮点数
        echo gettimeofday(true);
        // 输出：Array ( [sec] => 1553144693 [usec] => 308440 [minuteswest] => -480 [dsttime] => 0 )
        // 1553144693.3084
    }

    /**
     * gmdate(format,timestamp);
     * gmdate() 函数格式化 GMT/UTC 日期和时间，并返回格式化的日期字符串
     */
    public function testGmdate(){
        // 输出周几
        echo gmdate("l") . "<br>";

        // 输出周几、日、月、年，时间，上午或下午
        echo gmdate("l jS \of F Y h:i:s A");
        //输出：Thursday
        //Thursday 21st of March 2019 05:08:34 AM
    }

    /**
     * gmmktime(hour,minute,second,month,day,year,is_dst);
     * gmmktime() 函数返回 GMT 日期的 UNIX 时间戳。
        提示：该函数与 mktime() 相同，不同的是传递的参数代表了 GMT 日期。
     */
    public function testDateGmmktime(){
        //返回 GMT 日期的 UNIX 时间戳，然后使用它来查找该日期的天
        // 输出：October 3, 1975 was on a Friday
        echo "Oct 3, 1975 was on a ".date("l", gmmktime(0,0,0,10,3,1975));
    }
}
