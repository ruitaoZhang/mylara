<?php

namespace App\Http\Controllers\FunctionController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FunctionController extends Controller
{
    //php 7.1.*
    public function testList(){
        $data = [
            ["id" => 1, "name" => 'Tom'],
            ["id" => 2, "name" => 'Fred'],
        ];
        foreach ($data as ["id" => $id, "name" => $name]) {
            // logic here with $id and $name
            echo $id;
            echo $name;
        }
//        ["id" => $id1, "name" => $name1] = $data[2];

    }
    //php 7.1.* 短语法
    public function testList2(){
        $data = [
            [1, 'Tom'],
            [2, 'Fred'],
        ];
//        list($id1, $name1) = $data[0];
        [$id1, $name1] = $data[0];
        echo $id1;
//        ["id" => $id1, "name" => $name1] = $data[2];
    }
}
