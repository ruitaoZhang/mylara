<?php

namespace App\Http\Controllers\FunctionController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArrayFunctionController extends Controller
{
    //2019-02-13
    /**
     * 将数组的所有的键转换为大写字母
     * array_change_key_case(array, case)
     * array：为需要转换的数组
     * case： 转换类型（CASE_LOWER ：转换为小写；CASE_UPPER ：转换为大写）
     */
    public function testArrayChangeKeyCase(){
        //如果出现了相同key，最后的元素会覆盖其他元素
        $pets=array("a"=>"Cat","B"=>"Dog","c"=>"Horse","b"=>"Bird");
        print_r(array_change_key_case($pets,CASE_UPPER));

        $arr = [
            'a' => 'av',
            'b' => 'bv'
        ];
        dd(array_change_key_case($arr, CASE_UPPER));
    }

    /**
     * 把数组分割为带有两个元素的数组
     * array_chunk(array,size,preserve_key);
     * array => 规定要使用的数组
     * size => 整数值，规定每个新数组包含多少个元素
     * preserve_key => true:保留原始数组中的键名, false:默认。每个结果数组使用从零开始的新数组索引。
     */
    public function testArrayChunk(){
        $arr = [
            'a' => 'av',
            'b' => 'bv',
            'c' => 'cv',
            'd' => 'dv',
        ];

        $newArr1 = array_chunk($arr, 2, true);
        $newArr2 = array_chunk($arr, 3,false);
        print_r($newArr1);
        echo "<br/>";
        print_r($newArr2);
    }

    //2019-02-14
    /**
     * 返回输入数组中某个单一列的值
     * array_column(array,column_key,index_key)
     * array => 规定要使用的多维数组
     * column => 需要返回值的列
     * index_key => 可选。用作返回数组的索引/键的列。
     */
    public function testArrayColumn(){
        $arr = [
            [
                'id' => 1,
                'name' => 'lisi'
            ],
            [
                'id' => 2,
                'name' => 'zhangsan'
            ],
            [
                'id' => 3,
                'name' => 'wangwu'
            ],
        ];

        $name = array_column($arr, 'name');
        print_r($name);
        echo "<br/>";
        $name1 = array_column($arr, 'name', 'id');
        print_r($name1);
    }

    /**
     * 通过合并两个数组来创建一个新数组，其中的一个数组元素为键名，另一个数组元素为键值(两个数组的个数必须相同)
     * array_combine(keys,values)
     * keys => 数组键名
     * values => 数组键值
     */
    public function testArrayCombine(){
        $index = ['cc', 'll', 'bb'];
        $value = ['嘻嘻', '丽丽', '宝宝'];

        $arr = array_combine($index, $value);

        print_r($arr);
    }
}
