<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Prophecy\Exception\Doubler\MethodNotFoundException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

class ExceptionController extends Controller
{
    public function throwExcept(){
//        dd('33');
        throw new MethodNotFoundException('方法不允许访问！', 'ExceptionController', 'throwExcept');
    }
}
