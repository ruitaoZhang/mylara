<?php
/**
 * Created by PhpStorm.
 * User: CGY
 * Date: 7/1/2020
 * Time: 上午 10:00
 */

namespace App\Http\Controllers\Arithmetic;


class LinkedList
{
    public $header = null;
    public $last = null;
    public $size = 0;

    /**
     * 添加节点
     * @param $data
     */
    public function add($data)
    {
        // 创建一个节点对象
        $node = new Node($data);
        // 如果头部和尾部为null。则将节点设为头节点
        if ($this->header == null && $this->last == null) {
            $this->header = $node; // 插入第一个数据到头部
            $this->last = $node; // 插入第一个数据到尾部
        }
        // 如果头部和尾部不为 null 时（第二次操作及以上操作的时候）
        else {
            $this->last->next = $node; // 把尾部的下一个节点设为当前插入的节点
            $this->last = $node; // 把尾部的节点替换成当前插入的节点
        }
    }

    /**
     * 获取链表所有节点
     * @return string
     */
    public function getAllNode()
    {
        if ($this->header == null) {
            echo '链表为空！';
            return '';
        }
        // 从节点头部开始获取
        $node = $this->header;
        // 判读是否有下个节点
        while ($node->next != null) {
            echo $node->data; // 输出当前节点的数据
            echo "<br/>";
            $node = $node->next; // 把下个节点替换成当前节点
        }

        echo $node->data; // 输出尾部内容
        echo "<br/>";

    }

    /**
     * 删除一个节点
     * @param $data
     * @return bool
     */
    public function del($data)
    {
        $node = $this->header; // 获取链表头
        if ($node->data == $data) { // 判断要删除的节点是否为头部节点
            $this->header = $node->next; // 如果是，则把头部节点移动到头部节点的下一个子节点
            return true;
        } else {
            while($node->next->data == $data) { // 循环节点：删除节点和当前节点的下一个节点相同时
                $node->next = $node->next->next;// 就把当前的这个节点的下一个节点 指向下一个的下一个节点
                return true;
            }
        }

        return false;
    }

    /**
     * 更新节点中的值
     * @param $old
     * @param $new
     * @return bool
     */
    public function update($old, $new)
    {
        $node = $this->header; // 获取链表头节点
        while ($node->next != null) { // 如果有下一个几点
            if ($node->data = $old) { // 当前遍历的节点的数据与要修改的节点值相同的时候
                $node->data = $new; // 替换数据
                return true;
            }

            $node = $node->next; // 当前的节点为下一个节点，作用：循环下一个链表
        }

        echo "not found node<br/>";
        return false;
    }

    public function find($data)
    {
        $node = $this->header;
        while ($node->next != null) {
            if ($node->data == $data) {
                echo "found<br/>";
                return true;
            }

            $node = $node->next;
        }

        echo "not found<br/>";
    }

}