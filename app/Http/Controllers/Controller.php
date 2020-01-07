<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Arithmetic\LinkedList;
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

    /**
     * 测试普通队列
     */
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

    /**
     * 测试单链表
     */
    public function testLinkedList()
    {
        $linkedList = new LinkedList();

        $linkedList->add(1);
        $linkedList->add(2);
        $linkedList->add(3);

        $linkedList->getAllNode();

        $linkedList->del(2);
        $linkedList->update(3, 33);
        $linkedList->find(33);

        $linkedList->getAllNode();

        // 输出：
        //1
        //2
        //3
        //found
        //33
        //3
    }

}
