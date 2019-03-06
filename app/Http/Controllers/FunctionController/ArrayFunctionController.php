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

    /**
     * 返回包含数组中所有键名的一个新数组
     */
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

    //2019-02-22
    /**
     * 使用自定义函数，生成带有新值的数组
     * 回调函数接受的参数数目应该和传递给 array_map() 函数的数组数目一致
     * array_map(myfunction,array1,array2,array3...)
     *
     */
    public function testArrayMap(){
        $arrs = [
            "key1" => "value1",
            "key2" => "value2",
            "value3",
            "value5",
        ];

        $result = array_map(function ($arr){
            //此时的 $arr 是数组中的值
            return $arr."--";
        }, $arrs);
        print_r($result);
        //输出：Array ( [key1] => value1-- [key2] => value2-- [0] => value3-- [1] => value5-- )

        $result = array_map(function ($arr){
            //将数组中值的所有字母改为大写
            return strtoupper($arr);
        }, $arrs);

        print_r($result);
        //输出：Array ( [key1] => VALUE1 [key2] => VALUE2 [0] => VALUE3 [1] => VALUE5 )
    }

    /**
     * 函数把一个或多个数组合并为一个数组
     *
     */
    public function testArrayMerge(){
        $arr1 = ['a' => 'aa', 'b' => 'bb'];
        $arr2 = ['a' => 'vv', 'b' => 'bb'];

        $result = array_merge($arr1, $arr2);
        print_r($result);
        //如果出现相同的键，后一个的值覆盖前一个
        //输出：Array ( [a] => vv [b] => bb )

        print_r($arr1 + $arr2);
        //使用 + ：如果出现相同的键，只保留前一个值
        //输出： Array ( [a] => aa [b] => bb )

        $a=array(3=>"red",4=>"green");
        print_r(array_merge($a));
        //当只传入一个数组，且键名是整数，则该函数将返回带有整数键名的新数组，其键名以 0 开始进行重新索引
        //输出： Array ( [0] => red [1] => green )

    }

    /**
     * 函数把一个或多个数组合并为一个数组
     * 该函数与 array_merge() 函数的区别在于处理两个或更多个数组元素有相同的键名时。
     * array_merge_recursive() 不会进行键名覆盖，而是将多个相同键名的值递归组成一个数组。
     */
    public function testArrayMergeRecursive(){
        $a1=array("a"=>"red","b"=>"green");
        $a2=array("c"=>"blue","b"=>"yellow");

        print_r(array_merge_recursive($a1,$a2));
        //输出：Array ( [a] => red [b] => Array ( [0] => green [1] => yellow ) [c] => blue )

    }

    /**
     * array_multisort()
     * 函数返回排序数组
     * 注释：字符串键名将被保留，但是数字键名将被重新索引，从 0 开始，并以 1 递增
     * 如果两个或多个值相同，则按在原来数组的顺序排列
     */
    public function testArrayMultisort(){
        $a=array("Dog","Cat","Horse","Bear","Zebra");
        array_multisort($a);

        print_r($a);
        //输出：Array ( [0] => Bear [1] => Cat [2] => Dog [3] => Horse [4] => Zebra )

        $a=array("c2" => "Dog", "c" => "Dog", 9 => "Cat","Horse","Bear","Zebra");
        array_multisort($a, SORT_DESC, SORT_NATURAL);

        print_r($a);
        //输出： Array ( [0] => Bear [1] => Cat [c2] => Dog [c] => Dog [2] => Horse [3] => Zebra )
    }

    //2019-02-25

    /**
     * array_pad()
     * 函数将指定数量的带有指定值的元素插入到数组中
     * 提示：如果您将 size 参数设置为负数，该函数会在原始数组之前插入新的元素
     * 注释：如果 size 参数小于原始数组的长度，该函数不会删除任何元素
     */
    public function testArrayPad(){
        $a=array("red", "green");
        print_r(array_pad($a,5,"blue"));
        //输出：Array ( [0] => red [1] => green [2] => blue [3] => blue [4] => blue )

        $a=array("red", "green");
        print_r(array_pad($a,-5,"blue"));
        //输出： Array ( [0] => blue [1] => blue [2] => blue [3] => red [4] => green )
    }

    /**
     * array_pop()
     * 删除数组中的最后一个元素-出栈
     */
    public function testArrayPop(){
        $a=array("red", "green", "yellow");
        array_pop($a);
        print_r($a);
        //输出：Array ( [0] => red [1] => green )

    }

    /**
     * array_product()
     * 计算并返回数组的乘积
     */
    public function testArrayProduct(){
        $arr = [4, 4];
        print_r(array_product($arr));
        //输出：16

        $arr = [];
        print_r(array_product($arr));
        //输出：1

        $arr = [4, 4, 10];
        print_r(array_product($arr));
        //输出：160
    }

    /**
     * array_push($arr, "blue", 'pink')
     * 向第一个参数的数组尾部添加一个或多个元素（入栈），然后返回新数组的长度
     */
    public function testArrayPust(){
        $arr = ['red', 'white'];
        array_push($arr, "blue", 'pink');
        print_r($arr);
        //输出：Array ( [0] => red [1] => white [2] => blue [3] => pink )
    }

    /**
     * array_rand()
     * 函数返回数组中的随机键名，或者如果您规定函数返回不只一个键名，则返回包含随机键名的数组
     */
    public function testArrayRand(){
        $a=array("red","green","blue","yellow","brown");
        $random_keys=array_rand($a,3);
        echo $a[$random_keys[0]]."<br>";
        echo $a[$random_keys[1]]."<br>";
        echo $a[$random_keys[2]];
        //输出：red
        //green
        //brown
    }

    //2019-02-26

    /**
     * array_reduce(array,myfunction,initial)
     * array_reduce() 函数向用户自定义函数发送数组中的值，并返回一个字符串
     * 注释：如果数组是空的且未传递 initial 参数，该函数返回 NULL。
     */
    public function testArrayReduce(){
        $arr = ['red', 'white', 'blue'];

        $result = array_reduce($arr, function ($val, $va2){
            return $val.'-'.$va2;
        });
        print_r($result);
        //输出：-red-white-blue

        $result = array_reduce($arr, function ($val, $va2){
            return $val.'-'.$va2;
        }, 5);
        print_r($result);
        //输出：5-red-white-blue
    }

    /**
     * array_replace() 函数使用后面数组的值替换第一个数组的值
     *
     */
    public function testArrayReplace(){
        $a1=array("red","green");
        $a2=array("blue","yellow");
        print_r(array_replace($a1,$a2));
        //输出：Array ( [0] => blue [1] => yellow )

        //如果一个键存在于 array1 中同时也存在于 array2 中，第一个数组的值将被第二个数组中的值替换
        $a1=array("a"=>"red","b"=>"green");
        $a2=array("a"=>"orange","burgundy");
        print_r(array_replace($a1,$a2));
        //输出：Array ( [a] => orange [b] => green [0] => burgundy )

        //如果一个键仅存在于第二个数组中
        $a1=array("a"=>"red","green");
        $a2=array("a"=>"orange","b"=>"burgundy");
        print_r(array_replace($a1,$a2));
        //Array ( [a] => orange [0] => green [b] => burgundy )

        //使用三个数组 - 最后一个数组（$a3）会覆盖之前的数组（$a1 和 $a2）
        $a1=array("red","green");
        $a2=array("blue","yellow");
        $a3=array("orange","burgundy");
        print_r(array_replace($a1,$a2,$a3));
        //输出：Array ( [0] => orange [1] => burgundy )

        //使用数值键 - 如果一个键存在于第二个数组中单不在第一个数组中
        $a1=array("red","green","blue","yellow");
        $a2=array(0=>"orange",3=>"burgundy");
        print_r(array_replace($a1,$a2));
        //输出 Array ( [0] => orange [1] => green [2] => blue [3] => burgundy )
    }

    /**
     * array_replace_recursive() 函数递归地使用后面数组的值替换第一个数组的值
     */
    public function testArrayReplaceRecursive(){
        $a1=array("a"=>array("red"),"b"=>array("green","blue"),);
        $a2=array("a"=>array("yellow"),"b"=>array("black"));
        print_r(array_replace_recursive($a1,$a2));
        //输出：Array ( [a] => Array ( [0] => yellow ) [b] => Array ( [0] => black [1] => blue ) )

        //array_replace() 与 array_replace_recursive() 的差别
        $a1=array("a"=>array("red"),"b"=>array("green","blue"),);
        $a2=array("a"=>array("yellow"),"b"=>array("black"));

        $result=array_replace_recursive($a1,$a2);
        print_r($result);
        //Array ( [a] => Array ( [0] => yellow ) [b] => Array ( [0] => black [1] => blue ) )
        $result=array_replace($a1,$a2);
        print_r($result);
        // Array ( [a] => Array ( [0] => yellow ) [b] => Array ( [0] => black ) )
    }

    /**
     * array_reverse() 函数将原数组中的元素顺序翻转，创建新的数组并返回。
     * 如果第二个参数指定为 true，则元素的键名保持不变，否则键名将丢失。
     */
    public function testArrayReverse(){
        $a=array("a"=>"Volvo","b"=>"BMW","c"=>"Toyota");
        print_r(array_reverse($a, false));
        print_r($a);
        //输出：Array ( [c] => Toyota [b] => BMW [a] => Volvo )
    }

    /**
     * array_search() 函数在数组中搜索某个键值，并返回对应的键名
     */
    public function testArraySearch(){
        $a=array("a"=>"red","b"=>"green","c"=>"blue");
        echo array_search("red",$a);
        //输出：a

    }

    /**
     * array_shift() 函数删除数组中第一个元素，并返回被删除元素的值
     */
    public function testArrayShift(){
        $a=array("a"=>"red","b"=>"green","c"=>"blue");
        echo array_shift($a);
        print_r ($a);
        //输出：red Array ( [b] => green [c] => blue )

    }

    /**
     * array_slice(array,start,length,preserve)
     * 在数组中根据条件取出一段值，并返回
     *
     */
    public function testArraySlice(){
        $a=array("red","green","blue","yellow","brown");
        print_r(array_slice($a,2));
        //输出：Array ( [0] => blue [1] => yellow [2] => brown )
        $a=array("red","green","blue","yellow","brown");
        print_r(array_slice($a,1,2));
        //输出： Array ( [0] => green [1] => blue )

    }

    /**
     * array_splice(array,start,length,array)
     * array_splice() 函数从数组中移除选定的元素，并用新元素取代它。该函数也将返回包含被移除元素的数组
     */
    public function testArraySplice(){
        $a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
        $a2=array("a"=>"purple","b"=>"orange");
        array_splice($a1,0,2,$a2);
        print_r($a1);
        //输出：Array ( [0] => purple [1] => orange [c] => blue [d] => yellow )

        $a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
        $a2=array("a"=>"purple","b"=>"orange");
        print_r(array_splice($a1,0,2,$a2));
        //输出：Array ( [a] => red [b] => green )

        $a1=array("0"=>"red","1"=>"green");
        $a2=array("0"=>"purple","1"=>"orange");
        array_splice($a1,1,0,$a2);
        print_r($a1);
        //输出：Array ( [0] => red [1] => purple [2] => orange [3] => green )

    }

    /**
     * array_sum() 函数返回数组中所有值的和
     * 如果所有值都是整数，则返回一个整数值。如果其中有一个或多个值是浮点数，则返回浮点数。
     */
    public function testArraySum(){
        $a=array(5,15,25);
        echo array_sum($a);
        //输出：45

        $a=array("a"=>52.2,"b"=>13.7,"c"=>0.9);
        echo array_sum($a);
        //输出：66.8

    }

    //2019-03-05

    /**
     * array_unique(array)
     * 函数移除数组中的重复的值，并返回结果数组，当出现重复的值只保留第一个
     */
    public function testArrayUnique(){
        $a=array("a"=>"red","b"=>"green","c"=>"red");
        print_r(array_unique($a));
        //输出：Array ( [a] => red [b] => green )
    }

    /**
     * array_unshift(array,value1,value2,value3...)
     * 函数用于向数组插入新元素。新数组的值将被插入到数组的开头
     *
     */
    public function testArrayUnshift(){
        $a=array("a"=>"red","b"=>"green");
        array_unshift($a,"blue");
        print_r($a);
        //输出：Array ( [0] => blue [a] => red [b] => green )

        $a=array("a"=>"red","b"=>"green");
        print_r(array_unshift($a,"blue"));
        //输出：3

        $a=array(0=>"red",1=>"green");
        array_unshift($a,"blue");
        print_r($a);
        //输出：Array ( [0] => blue [1] => red [2] => green )
    }

    /**
     * array_values() 函数返回一个包含给定数组中所有键值的数组，但不保留键名
     */
    public function testArrayValues(){
        $a=array("Name"=>"Bill","Age"=>"60","Country"=>"USA");
        print_r(array_values($a));
        //输出：Array ( [0] => Bill [1] => 60 [2] => USA )

    }

    /**
     * array_walk(array,myfunction,userdata...)
     * array_walk() 函数对数组中的每个元素应用用户自定义函数。在函数中，数组的键名和键值是参数
     *
     */
    public function testArrayWalk(){

        $a=array("a"=>"red","b"=>"green","c"=>"blue");
        array_walk($a, function($value,$key)
        {
            echo "The key $key has the value $value<br>";
        });
        //输出：
        //The key a has the value red
        //The key b has the value green
        //The key c has the value blue

        $a=array("a"=>"red","b"=>"green","c"=>"blue");
        array_walk($a,function($value,$key,$p){
            echo "$key $p $value<br>";
        },"has the value");
        //输出：
        //a has the value red
        //b has the value green
        //c has the value blue

        //通过引用改变数组内容
        $a=array("a"=>"red","b"=>"green","c"=>"blue");
        array_walk($a,function(&$value,$key){
            $value="yellow";
        });
        print_r($a);
        //输出：Array ( [a] => yellow [b] => yellow [c] => yellow )
    }

    //2019-03-06

    /**
     * array_walk_recursive() 函数对数组中的每个元素应用用户自定义函数。在函数中，数组的键名和键值是参数
     * 该函数与 array_walk() 函数的不同在于可以操作更深的数组（一个数组中包含另一个数组）
     */
    public function testArrayWalkRecursive(){

        $a1=array("a"=>"red","b"=>"green");
        $a2=array($a1,"1"=>"blue","2"=>"yellow");
        array_walk_recursive($a2,function($value,$key){
            echo "键 $key 的值是 $value 。<br>";
        });
        //输出：键 a 的值是 red 。
        //键 b 的值是 green 。
        //键 1 的值是 blue 。
        //键 2 的值是 yellow 。
    }

    /**
     * arsort(array,sortingtype);
     * 对关联数组按照键值进行降序排序。
     * 提示：请使用 asort() 函数对关联数组按照键值进行升序排序。
     * 提示：请使用 krsort() 函数对关联数组按照键名进行降序排序。
     */
    public function testArrayArsort(){
        $age=array("Bill"=>"60","Steve"=>"6","Mark"=>"31");
        arsort($age);
        print_r($age);
        //输出：Array ( [Bill] => 60 [Mark] => 31 [Steve] => 6 )
    }

    /**
     * asort(array,sortingtype);
     * asort() 函数对关联数组按照键值进行升序排序
     */
    public function testArrayAsort(){
        $age=array("Bill"=>"60","Steve"=>"56","Mark"=>"31");
        asort($age);
        print_r($age);
        //输出：Array ( [Mark] => 31 [Steve] => 56 [Bill] => 60 )
    }

    /**
     * krsort() 函数对关联数组按照键名进行降序排序
     */
    public function testArrayKrsort(){
        $age=array("Bill"=>"60","Steve"=>"56","Mark"=>"31");
        krsort($age);
        print_r($age);
    }

    /**
     * compact(var1,var2...)
     * 函数创建包含变量名和它们的值的数组
     * 注释：任何没有变量名与之对应的字符串都被略过。
     */
    public function testCompact(){
        $firstname = "Bill";
        $lastname = "Gates";
        $age = "60";

        $result = compact("firstname", "lastname", "age");

        print_r($result);
        //输出：Array ( [firstname] => Bill [lastname] => Gates [age] => 60 )

        $firstname = "Bill";
        $lastname = "Gates";
        $age = "60";

        $name = array("firstname", "lastname");
        $result = compact($name, "location", "age");

        print_r($result);
        //输出：Array ( [firstname] => Bill [lastname] => Gates [age] => 60 )

    }


}
