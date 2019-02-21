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
        //输出：Array ( [cc] => 嘻嘻 [ll] => 丽丽 [bb] => 宝宝 )
    }
    //2019-02-15
    /**
     * 对数组中的所有值进行计数
     * array_count_values(array)
     */
    public function testArrayCountValues(){
        $arr = array('aa', 'bb', 'aa', 'cc');

        print_r(array_count_values($arr));
        //输出：Array ( [aa] => 2 [bb] => 1 [cc] => 1 )
    }

    /**
     * 函数返回两个数组的差集数组。该数组包括了所有在被比较的数组中，但是不在任何其他参数数组中的键值。
     * 在返回的数组中，键名保持不变。
     * array_diff(array1,array2,array3...)
     * array1 => 与其他数组进行比较的第一个数组。
     * array2 => 与第一个数组进行比较的数组。
     * array3 => 与第一个数组进行比较的数组。
     */
    public function testArrayDiff(){
        $arr1 = ['aa', 'bb', 'cc', 'dd'];
        $arr2 = ['bb', 'gg', 'aa', 'ff'];
        $arr3 = ['cc', 'kk'];

        $result = array_diff($arr1, $arr2);
        print_r($result);
        //输出：Array ( [2] => cc [3] => dd )

        $result = array_diff($arr1, $arr2, $arr3);
        print_r($result);
        //输出：Array ( [3] => dd )

    }
    //2019-02-16
    /**
     * 函数用于比较两个（或更多个）数组的键名和键值 ，并返回差集
     * array_diff_assoc(array1,array2,array3...)
     * array1 => 与其他数组进行比较的第一个数组。
     * array2 => 与第一个数组进行比较的数组。
     * array3 => 与第一个数组进行比较的数组。
     */
    public function testArrayDiffAssoc(){
        $a1=array("a"=>"red","b"=>"green","c1"=>"blue","d"=>"yellow");
        $a2=array("a"=>"red","b2"=>"green","c"=>"blue");

        $result = array_diff_assoc($a1, $a2);
        print_r($result);
        //输出：Array ( [b] => green [c1] => blue [d] => yellow )

        $a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
        $a2=array("a"=>"red","f"=>"green","g"=>"blue");
        $a3=array("h"=>"red","b"=>"green","g"=>"blue");

        $result=array_diff_assoc($a1,$a2,$a3);
        print_r($result);
        //输出：Array ( [c] => blue [d] => yellow )
    }

    /**
     * 比较两个（或更多个）数组的键名 ，并返回差集
     * array_diff_key(array1,array2,array3...)
     * array1 => 与其他数组进行比较的第一个数组。
     * array2 => 与第一个数组进行比较的数组。
     * array3 => 与第一个数组进行比较的数组。
     */
    public function testArrayDiffKey(){
        $arr1 = ['a' => 'ac', 'b' => 'bc', 'c' => 'cc'];
        $arr2 = ['b' => 'bc', 'b' => 'bb'];
        $arr3 = ['a' => 'a3', 'j' => 'jb'];

        $result = array_diff_key($arr1, $arr2);
        print_r($result);
        //输出：Array ( [a] => ac [c] => cc )

        $result = array_diff_key($arr1, $arr2, $arr3);
        print_r($result);
        //输出：Array ( [c] => cc )
    }
    //2019-02-17
    /**
     * 比较两个数组的键名和键值（使用用户自定义函数来比较键名），并返回差集
     * array_diff_uassoc(array1,array2,array3...,myfunction)
     * array1 => 与其他数组进行比较的第一个数组。
     * array2 => 与第一个数组进行比较的数组。
     * array3 => 与第一个数组进行比较的数组。
     * myfunction => 定义可调用比较函数的字符串
     */
    public function testArrayDiffUassoc(){
        $a1=array("a"=>"red","b"=>"green","c1"=>"blue","d"=>"yellow");
        $a2=array("a"=>"red","b2"=>"green","c"=>"blue");

        $result = array_diff_uassoc($a1, $a2, function ($a, $b){
            if ($a === $b)
            {
                return 0;
            }
            return ($a > $b) ? 1 : -1;
        });
        print_r($result);
        //输出：Array ( [b] => green [c1] => blue [d] => yellow )
    }

    public function testArrayDiffUkey(){
        $arr1 = ['a' => 'ac', 'b' => 'bc', 'c' => 'cc'];
        $arr2 = ['b' => 'bc', 'b' => 'bb'];

        $result = array_diff_ukey($arr1, $arr2, function ($a, $b){
            if ($a === $b)
            {
                return 0;
            }
            return ($a > $b) ? 1 : -1;
        });
        print_r($result);
        //输出：Array ( [a] => ac [c] => cc )
    }
    //2019-02-18
    /**
     * 用键值填充数组
     * array_fill(index,number,value)
     * index => 返回数组的第一个索引
     * number => 规定要插入的元素数
     * value => 规定供填充数组所使用的值
     *
     */
    public function testArrayFill(){
        $a1=array_fill(3,5,"blue");
        print_r($a1);
        //输出：Array ( [3] => blue [4] => blue [5] => blue [6] => blue [7] => blue )
    }

    /**
     * 使用指定的键和值填充数组
     * array_fill_keys(keys,value)
     * keys => 使用该数组的值作为键
     * value => 填充数组所使用的值
     */
    public function testArrayFillKeys(){
        $keys = ['index1', 'index2', 'index3'];
        $arr = array_fill_keys($keys, 'rt');

        print_r($arr);
        //输出：Array ( [index1] => rt [index2] => rt [index3] => rt )
    }

    //2019-02-19
    /**
     * 用回调函数过滤数组中的元素
     * array_filter(array,callbackfunction)
     */
    public function testArrayFilter(){
        $a1=array("a","b",2,3,4);

        print_r(array_filter($a1,function ($var){
//            return($var & 1);
            return $var > 2;
        }));
        //输出：Array ( [3] => 3 [4] => 4 )
    }

    /**
     * 函数用于反转/交换数组中所有的键名以及它们关联的键值（需注意重复的值的问题）
     * array_flip(array)
     */
    public function testArrayFlip(){
        $arr = [
            'key1' => 'val1',
            'key2' => 'val2',
            'key3' => 'val3',
        ];

        print_r(array_flip($arr));
        //输出：Array ( [val1] => key1 [val2] => key2 [val3] => key3 )
    }

    //2019-02-20
    /**
     * 比较两个数组的键值，并返回交集
     * array_intersect(array1,array2,array3...)
     * 返回在array1、array2、array3中共同存在键值，键名保留不变
     */
    public function testArrayIntersect(){
        $arr1 = ['a' => 'av', 'b1' => 'bv', 'c' => 'cv'];
        $arr2 = ['a' => 'av', 'b2' => 'bv', 'c' => 'cv2'];
        $arr3 = ['a' => 'cv', 'b3' => 'bv', 'c' => 'cv'];

        $result = array_intersect($arr1, $arr2);
        print_r($result);
        //输出：Array ( [a] => av [b1] => bv )

        $result = array_intersect($arr1, $arr2, $arr3);
        print_r($result);
        //输出：Array ( [b1] => bv )

    }

    /**
     * 比较两个数组的键名和键值，并返回交集
     * array_intersect_assoc(array1,array2,array3...)
     * 
     */
    public function testArrayIntersectAssoc(){
        $arr1 = array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
        $arr2 = array("a"=>"red","b"=>"green","c"=>"blue");
        $arr3 = array("a"=>"red","b"=>"green","c"=>"blue1");

        $result = array_intersect_assoc($arr1, $arr2);
        print_r($result);
        //输出：Array ( [a] => red [b] => green [c] => blue )

        $result = array_intersect_assoc($arr1, $arr2, $arr3);
        print_r($result);
        //输出：Array ( [a] => red [b] => green )
    }

    //2019-02-21
    /**
     * 检查某个数组中是否存在指定的键名
     * array_key_exists(key,array)
     */
    public function testArrayKeyExists(){
        $arr = ['a' => 'av', 'b' => 'bv'];

        echo 'the key is b';
        if (array_key_exists('b', $arr)){
            echo "键存在";
        }else{
            echo "键不存在";
        }
        //输出：the key is b 键存在
    }

    public function testArrayKeys(){
        $arr = [
            'red' => '#ccsd',
            'white' => '#xxxc',
            'yellow' => '#fsee',
        ];

        $result = array_keys($arr);
        print_r($result);
        //输出：Array ( [0] => red [1] => white [2] => yellow )
    }

    
}
