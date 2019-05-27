<?php

namespace App\Http\Controllers\Algorithm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlgorithmController extends Controller
{
    /**
     * 二分查找
     * 1000个数以内的数，折算10次可找到查询的数字
     */
    public function binarySearchValue(){
        $total = 1000;
        $arr = [];
        for ($i = 0; $i < $total; $i++){
            $arr[$i] = $i + 1;
        }
//        dd($arr);
        print_r($this->binarySearch($arr, 155));
    }

    public function binarySearch($arr, $target){
        $start = 0;
        $end = count($arr) - 1;
        $time = 0;
        while ($start <= $end){
            $start1 = $start;
            $mid = floor(($start1 + $end) / 2);
            echo "start-$time-".$start."<br/>";
            echo "end-$time-".$end."<br/>";
            echo "mid-$time-".$mid."<br/>";
            $time++;
            if ($arr[$mid] == $target){
                return $mid;
            }elseif ($arr[$mid] < $target){
                //        dd($arr[$mid]);
                $start = $mid + 1;
            }else{
                $end = $mid - 1;
            }
        }
        return -1;
    }
}
