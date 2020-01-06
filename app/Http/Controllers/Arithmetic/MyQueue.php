<?php
/**
 * Created by PhpStorm.
 * User: CGY
 * Date: 6/1/2020
 * Time: 下午 3:51
 */

namespace App\Http\Controllers\Arithmetic;


class MyQueue
{
    public $queue;

    public function __construct()
    {
        $this->queue = [];
    }

    /**
     * 入队
     * @param $value
     */
    public function push($value)
    {
        array_push($this->queue, $value);
    }

    /**
     * 出队
     * @return mixed
     */
    public function pop()
    {
        return array_shift($this->queue);
    }

    /**
     * 查看队列长度
     * @return int
     */
    public function length()
    {
        return count($this->queue);
    }

    /**
     * 清空队列
     */
    public function clear()
    {
        $this->queue = [];
    }

    /**
     * 输出队列内容
     * @return array
     */
    public function printQueue()
    {
        return $this->queue;
    }

    /**
     * 获取队列第一个元素
     * @return mixed
     */
    public function front()
    {
        return $this->queue[0];
    }
}