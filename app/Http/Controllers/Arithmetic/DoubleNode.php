<?php
/**
 * Created by PhpStorm.
 * User: CGY
 * Date: 7/1/2020
 * Time: 上午 11:33
 */

namespace App\Http\Controllers\Arithmetic;


class DoubleNode
{
    /**
     * 数据元素
     * @var
     */
    public $data;

    /**
     * 前驱节点
     */
    public $prev;

    /**
     * 后继节点
     * @var
     */
    public $next;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
        $this->prev = null;
    }
}