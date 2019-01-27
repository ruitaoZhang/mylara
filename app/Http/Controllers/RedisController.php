<?php

namespace App\Http\Controllers;

use App\Events\PublishRedisEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    public function saveRedisValue()
    {
        $order = '123456';
        Cache::store('redis')->put('ORDER_CONFIRM:'.$order, 10, 1); // 30分钟后过期--执行取消订单
        $redis = Cache::store('redis')->get('ORDER_CONFIRM:'.$order);
        dd($redis);
        \Log::error('======='.$redis);
    }

    //发布redis消息
    public function publishRedis(){
        Redis::publish('test-channel', json_encode(['foo' => 'bar']));
    }

    //通过事件发布消息
    public function pulishRedisForEvent(){
//        Redis::publish('test-channel', json_encode(['foo' => 'bar']));
        event(new PublishRedisEvent('zrt', 22, 'channel-1'));
    }
}
