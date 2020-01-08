<?php
/**
 * Created by PhpStorm.
 * User: CGY
 * Date: 8/1/2020
 * Time: 上午 11:09
 */

namespace App\Http\Controllers\Arithmetic;


class Sort
{
    /**
     * 冒泡排序
     * @param $arr
     * @return mixed
     */
    public function bubble($arr)
    {
        $len = count($arr);

        for ($i = 0; $i < $len; $i++) {
            // 没执行一次都会把最大值移动到最后
            for ($j = 0; $j < ($len - 1 - $i); $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    // 方法一：创建一个临时变量来进行替换
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $tmp;
                    // 方法二：
                    // list($arr[$j], $arr[$j+1]) = [$arr[$j+1], $arr[$j]];
                }
            }
        }
        return $arr;
    }

    /**
     * 选择排序
     * @param $arr
     * @return mixed
     */
    public function select($arr)
    {
        $len = count($arr);
        for ($i = 0; $i < $len - 1; $i++) {
            $min = $i; // 假设当前下标为 i 的元素最小，然后再进行循环比对
            echo '$min-->' . $arr[$min] . '-->';
            for ($j = $i + 1; $j < $len; $j++) {
                // 如果遇到比它还小的则进行替换
                if ($arr[$min] > $arr[$j]) {
                    $min = $j;
                }
            }
            // 将当前内循环的最小元素放在$i位置上
            echo $arr[$min] . "<br/>";
            if ($min != $i) {
                $tmp = $arr[$i];
                $arr[$i] = $arr[$min];
                $arr[$min] = $tmp;
            }
        }
        return $arr;
    }

    /**
     * 插入排序
     * @param $sort
     * @return mixed
     */
    public function insert($sort)
    {
        $count = count($sort);
        for ($i = 1; $i < $count; $i++) {
            $sentinel = $sort[$i];
            $j = $i - 1;
            // 前一位比当前哨兵大，则前一位需要往后移动一位
            while ($j >= 0 && $sort[$j] > $sentinel) {
                $sort [$j + 1] = $sort [$j];//$j 后移一位
                $j--;
            }
            if ($i != $j + 1) {
                $sort[$j + 1] = $sentinel;
            }
        }
        return $sort;
    }

    public function insert2($arr)
    {
        $len = count($arr);
        for ($i = 0; $i < $len - 1; $i++) {
            for ($j = $i + 1; $j > 0; $j--) {
                if ($arr[$j - 1] > $arr[$j]) {
                    $tmp = $arr[$j - 1];
                    $arr[$j - 1] = $arr[$j];
                    $arr[$j] = $tmp;
                }
            }
        }
        return $arr;
    }

    public static function quick1($arr)
    {
        if (count($arr) <= 1) { //如果数组根本就一个元素就直接返回 不用在排序咯
            return $arr;
        }

        $k = $arr[0];//定义一个初始要排序的值 默认为数组第一个
        $x = array();//定义比要排序的值 小的数组块
        $y = array();//定义比要排序的值 大的数组块
        $_size = count($arr);//统计数组的大小
        for ($i = 1; $i < $_size; $i++) {//循环数组 记住这边要从索引1 开始
            if ($arr[$i] <= $k) {//如果当前的值小于 要排序的值
                $x[] = $arr[$i];//就把小于的值放到 小的数组块中
            } elseif ($arr[$i] > $k) {//如果当前的值大于 要排序的值
                $y[] = $arr[$i];//就把大于的值放到 大的数组块中
            }
        }
        $x = Sort::quick1($x);//依次递归执行 这样就会得到小的数组块
        $y = Sort::quick1($y);//依次递归执行 这样就会得到大的数组块
        echo $k."<br/>";
        return array_merge($x, array($k), $y);//最后在合并下 小的模块+中间的模块【初始要排序的值】+大的模块
    }

    /**
     * 快速排序
     * @param $arr
     * @return array
     */
    public static function quick($arr)
    {
        if (count($arr) <= 1) {//如果数组根本就一个元素就直接返回 不用在排序
            return $arr;
        }

        $pos = $arr[0];//定义一个初始要排序的值 默认为数组第一个
        $min = [];//定义比要排序的值 小的数组块
        $max = [];//定义比要排序的值 大的数组块
        $len = count($arr);//统计数组的大小
        for ($i = 1; $i < $len; $i++) {//循环数组 记住这边要从索引1 开始(因为下标为零的值以作为初始排序值)
            if ($pos > $arr[$i]) {
                $min[] = $arr[$i];
            }
            if ($pos < $arr[$i]) {
                $max[] = $arr[$i];
            }
        }

        $min = Sort::quick($min);//依次递归执行 这样就会得到小的数组块
        $max = Sort::quick($max);//依次递归执行 这样就会得到大的数组块

        return array_merge($min, [$pos], $max);//最后在合并下 小的模块+中间的模块【初始要排序的值】+大的模块
    }

}