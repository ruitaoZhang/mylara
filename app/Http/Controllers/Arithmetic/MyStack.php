<?php
/**
 * Created by PhpStorm.
 * User: CGY
 * Date: 6/1/2020
 * Time: 下午 2:59
 */
namespace App\Http\Controllers\Arithmetic;

class MyStack
{
    public $stack;

    public function __construct()
    {
        $this->stack = [];
    }

    /**
     * 添加新元素到栈顶
     * @param $value
     */
    public function push($value)
    {
        array_push($this->stack, $value);
    }

    /**
     * 移除栈顶元素，同时返回被移除的元素
     * @return mixed
     */
    public function pop()
    {
        return array_pop($this->stack);
    }

    /**
     * 是否为空栈
     * @return bool
     */
    public function isEmpty()
    {
        return count($this->stack) === 0;
    }

    /**
     * 返回栈中的元素
     * @return array
     */
    public function printArr()
    {
        return $this->stack;
    }

    /**
     * 清空栈
     */
    public function clear()
    {
        $this->stack = [];
    }

    /**
     * 查看栈的长度
     * @return int
     */
    public function length()
    {
        return count($this->stack);
    }

    /**
     * 查看栈顶元素
     * @return mixed
     */
    public function peek()
    {
        return $this->stack[count($this->stack - 1)];
    }
}