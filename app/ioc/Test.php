<?php
/**
 * Created by PhpStorm.
 * User: CGY
 * Date: 2019/4/12
 * Time: 16:48
 */
namespace App\ioc;

class Test
{
//    public $kb;
//    public function __construct()
//    {
//        @parent;
////        $this->kb = $kb;
//    }

    public function worker(Keyboard $kb){
        \Log::error($kb->worker());
        return $kb->worker();

    }
}