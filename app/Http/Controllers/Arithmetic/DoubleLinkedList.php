<?php
/**
 * Created by PhpStorm.
 * User: CGY
 * Date: 7/1/2020
 * Time: 上午 11:35
 */

namespace App\Http\Controllers\Arithmetic;


class DoubleLinkedList
{
    /**
     * 头节点
     * @var
     */
    private $header;

    public function __construct()
    {
        $this->header = null;
    }

    /**
     * 判断是否为空链表
     * @return bool
     */
    public function isEmply()
    {
        return is_null($this->header);
    }

    /**
     * 获取链表的长度
     * @return int
     */
    public function length()
    {
        $current = $this->header;
        $count = 0;

        while ($current->next != null) {
            $count++;
            $current = $current->next;
        }

        return $count;
    }

    /**
     * 遍历整个链表
     * @return array
     */
    public function travel()
    {
        $current = $this->header;

        $list = [];
        while (!is_null($current)) {
            // 将链表中的数据存放到数组中
            array_push($list, $current->data);
            $current = $current->next;
        }

        return $list;
    }

    /**
     * 链表头部添加元素
     * @param $data
     */
    public function add($data)
    {
        // 创建一个节点
        $node = new DoubleNode($data);
        // 判读链表是否为空
        if ($this->isEmply()) {
            // 为空时把当前创建的节点设置为头部节点
            $this->header = $node;
        }
        // 如果已经存在头部节点
        else {
            // 第一步：将插入的节点的下一个节点设置为当前的头部节点（头部插入）
            $node->next = $this->header;
            // 第二步：将当前头部的上一个节点设置为当前创建的节点
            $this->header->prev = $node;
            // 第三步：将头部节点改为当前创建的节点
            $this->header = $node;
        }
    }

    /**
     * 链表尾部添加元素
     * @param $data
     */
    public function append($data)
    {
        $node = new DoubleNode($data); // 定义一个节点对象

        if ($this->isEmply()) { // 如果头部节点定义为空
            $this->header = $node; // 则将头部节点设为当前定义的节点
        }
        else {
            // 移动到尾部节点
            $current = $this->header;
            // 由于当前的 head 指在链表头部，所以需要移动到尾部节点再进行插入
            while (!is_null($current->next)) {//循环输出下一个节点 不为空的情况下
                $current = $current->next;//将当前的节点定义为找到的尾部节点的下一个指针 因为是当前的节点
            }
            // 原本尾节点 next 指向新创建的节点
            $current->next = $node;
            // 新创建的节点 prev 指向原本尾部节点
            $node->prev = $current;
        }
    }

    /**
     * 指定位置添加元素
     * @param $pos
     * @param $data
     */
    public function insert($pos, $data)
    {
        switch ($pos) {
            // 若指定的位置 pos 为第一个元素之前，则执行头部插入
            case $pos <= 0:
                $this->add($data);
                break;
            // 若指定位置超过链表尾部，则执行尾部插入
            case $pos > ($this->length()-1):
                $this->append($data);
                break;
            // 找到位置进行插入
            default:
                $node = new DoubleNode($data);
                $count = 0;
                $current = $this->header;

                // 循环移动到指定位置的前一个位置
                while($count < ($pos - 1)) {
                    $current = $current->next; // 把要插入到哪个位置的节点拿出来
                    $count++;
                }
                // 关键步骤
                $node->prev = $current; // 第一步：要插入的节点上一个就是要拿出来的当前节点
                $node->next = $current->next; // 第二步：要插入的节点的下一个节点 就是拿出来的当前节点的下一个节点

                $current->next->prev = $node; // 第三步：关键；把拿出来的下一个节点的上一个节点指向要插入的节点

                $current->next = $node; // 第四步：把拿出来的下一个节点指向当前要插入的节点
        }
    }

    /**
     * 删除节点
     * @param $data
     */
    public function remove($data)
    {
        // 判断头部是否为空，空则不用处理
        if ($this->isEmply()) {
            return ;
        }

        $current = $this->header; // 定义一个当前元素为头部节点
        // 如果第一个就是要删除的节点
        if ($data == $current->data) {
            // 如果链表只有一个节点，则把这个链表头部节点设为null
            if (is_null($current->next)) {
                $this->header = null;
            }
            // 如果头部节点有下一个节点的话
            else {
                $current->next->prev = null; // 第一步：就把头部节点的下一个节点的上一个节点设为 null
                $this->header = $current->next;// 第二步：把头部节点指向当前节点的下一个节点
            }
            return ;
        }
        // 如果要删除的值不是头部节点，就需要循环查找再删除节点
        while (!is_null($current)) {
            // 查找到节点
            if ($current->data == $data) {
                $current->prev->next = $current->next; // 第一步：当前的上一个节点的下个节点替换为当前节点的下一个节点
                $current->next->prev = $current->prev; // 第二步：当前的下一个节点的上一个节点替换为当前要删除的节点的上一个节点

                break; // 跳出while循环
            }
            $current = $current->next; // 定义当前的节点为下一个节点，继续循环查找
        }
    }

    /**
     * 查找节点是否存在
     * @param $data
     * @return bool
     */
    public function search($data)
    {
        if ($this->isEmply()) {
            return false;
        }

        $current = $this->header; // 定义头部节点
        // 循环查找节点
        while (!is_null($current->next)) {
            if ($current->data == $data) {
                return true;
            }
            $current = $current->next;
        }

        return false;
    }
}