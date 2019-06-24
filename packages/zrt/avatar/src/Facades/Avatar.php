<?php
/**
 * Created by PhpStorm.
 * User: zrt
 * Date: 2019/6/24
 * Time: 10:20
 */

namespace Zrt\Avatar\Facades;

use Illuminate\Support\Facades\Facade;

class Avatar extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'avatar';
    }
}