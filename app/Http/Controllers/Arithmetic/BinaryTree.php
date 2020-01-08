<?php
/**
 * Created by PhpStorm.
 * User: CGY
 * Date: 7/1/2020
 * Time: 下午 3:40
 */

namespace App\Http\Controllers\Arithmetic;


class BinaryTree
{
    public $data;
    public $left = null;
    public $right = null;

    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
     * DLR 先序遍历(根左右)
     */
    public function preOrder()
    {
        echo $this->data." "; // 先输出根节点 8 3 1
        if ($this->left) { // 如果这个根节点有左子树 8 3 6 14
            $this->left->preOrder(); // 递归输出左子树
        }
        if ($this->right) { // 如果这个子节点有右子树 8 3 6 10
            $this->right->preOrder(); // 递归输出右子树
        }
    }
    /**
     * LDR 中序遍历（左根右）
     */
    public function inOrder()
    {
        // 先遍历出左边的树
        if ($this->left) {
            echo "开始递归左子树".$this->left->data."<br/>";
            $this->left->inOrder();
        }
        echo $this->data." "; // 输出中间的树的值
        if ($this->right) { // 遍历右边的树
            echo "开始递归左子树".$this->right->data."<br/>";
            $this->right->inOrder();
        }
    }
    /**
     * LRD 后序遍历（左右根）
     */
    public function postOrder()
    {
        if ($this->left) { // 递归遍历左子树
            $this->left->postOrder();
        }
        if ($this->right){ // 递归遍历右子树
            $this->right->postOrder();
        }
        echo $this->data . " "; // 输出树节点数据
    }
}