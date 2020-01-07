<?php
/**
 * Created by PhpStorm.
 * User: CGY
 * Date: 7/1/2020
 * Time: 上午 9:59
 */

namespace App\Http\Controllers\Arithmetic;


class Node
{
    public $data = null;
    public $next = null;

    public function __construct($data, $next = null)
    {
        $this->data = $data;
        $this->next = $next;
    }
}
