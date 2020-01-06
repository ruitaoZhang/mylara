<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Arithmetic\MyQueue;
use App\Http\Controllers\Arithmetic\MyStack;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 测试栈
     */
    public function testStack()
    {
        $stack = new MyStack();

        $stack->push(1);
        $stack->push(2);
        $stack->push(3);

        print_r($stack->printArr());
        print_r("<br/>");
        print_r($stack->pop());
        print_r("<br/>");

        print_r($stack->isEmpty());
        print_r("<br/>");

        print_r($stack->length());
        print_r("<br/>");


        print_r($stack->printArr());
    }


    public function testQueue()
    {
        $queue = new MyQueue();
        $queue->push(1);
        $queue->push(2);
        $queue->push(3);

        print_r($queue->length());
        print_r("<br/>");

        print_r($queue->printQueue());
        print_r("<br/>");

        print_r($queue->pop());
        print_r("<br/>");

        print_r($queue->length());
        print_r("<br/>");

        print_r($queue->printQueue());
        print_r("<br/>");

        print_r($queue->front());
        print_r("<br/>");
    }

    public function testLinkedList()
    {

    }

}
