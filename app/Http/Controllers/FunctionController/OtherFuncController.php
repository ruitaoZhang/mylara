<?php

namespace App\Http\Controllers\FunctionController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OtherFuncController extends Controller
{
    /**
     * 使用数组键名作为变量名，使用数组键值作为变量值
     * extract(array,extract_rules,prefix)
     */
    public function testExtract(){
        $arr = [
            'name' => 'rt',
            'age' => 24,
            'gender' => '男'
        ];
        extract($arr);

        echo $name."<br/>";
        echo $age."<br/>";
        echo $gender."<br/>";

        echo "<br/>";
        echo "输出原键名<br/>";
        echo "\$name = $name"."<br/>";
        echo "\$age = $age"."<br/>";
        echo "\$gender = $gender";

        //输出：rt
        //24
        //男
        //
        //输出原键名
        //$name = rt
        //$age = 24
        //$gender = 男
    }


}
