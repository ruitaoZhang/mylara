<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Arithmetic\BinaryTree;
use App\Http\Controllers\Arithmetic\DoubleLinkedList;
use App\Http\Controllers\Arithmetic\LinkedList;
use App\Http\Controllers\Arithmetic\MyQueue;
use App\Http\Controllers\Arithmetic\MyStack;
use App\Http\Controllers\Arithmetic\Sort;
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
        //found0
        //33
        //3
    }
    /**
     * 测试双向链表
     */
    public function testDoubleLinkedList()
    {
        $doubleList = new DoubleLinkedList();

        $doubleList->add(1);
        $doubleList->add(2);
        $doubleList->add(3);

        $list = $doubleList->travel();
        $length = $doubleList->length();
        $emply = $doubleList->isEmply();
        // 在链表尾部插入一个节点
        $doubleList->append(33);
        $list2 = $doubleList->travel();
        // 指定位置插入一个节点
        $doubleList->insert(2, 444);
        $list3 = $doubleList->travel();
        // 删除一个节点
        $doubleList->remove(2);
        $list4 = $doubleList->travel();

        dd($list, $length, $emply, $list2, $list3, $list4);
    }

    /**
     * 测试二叉树
     */
    public function binaryTree()
    {
        $trees = new BinaryTree(8);
        $trees->left =  new BinaryTree(3);
        $trees->left->left =  new BinaryTree(1);
        $trees->left->right = new BinaryTree(6);
        $trees->left->right->left = new BinaryTree(4);
        $trees->left->right->right = new BinaryTree(7);
        $trees->right =  new BinaryTree(10);
        $trees->right->right = new BinaryTree(14);
        $trees->right->right->left =  new BinaryTree(13);
        echo "<pre>";
        $trees->preOrder();
        // 输出：8 3 1 6 4 7 10 14 13
        echo "<pre>";
        $trees->inOrder();
        echo "<pre>";
        $trees->postOrder();
        // 输出：1 4 7 6 3 13 14 10 8
    }

    /**
     * 冒泡排序
     */
    public function bubble()
    {
        $arr = [1,5,3,11,10,2];
        $sort = new Sort();
        $arr = $sort->bubble($arr);
        dd($arr);
    }

    /**
     * 简单选择排序
     */
    public function select()
    {
        $arr = [1,5,3,11,10,2];
        $sort = new Sort();
        $arr = $sort->select($arr);
        dd($arr);
    }


    /**
     * 插入排序
     */
    public function insert()
    {
        $arr = [1,5,3,11,10,2];
        $sort = new Sort();
        $arr = $sort->insert($arr);
        dd($arr);
    }

    /**
     * 快速排序
     */
    public function quick()
    {
        $arr = [1,5,3,11,10,2];
        $sort = new Sort();
        $arr = $sort->quick($arr);
        dd($arr);
    }

}
