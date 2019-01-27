<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class OrderExpireListen extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '监听订单创建，在1分钟后如果没付款取消订单。';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        ini_set('default_socket_timeout', -1);
        $cachedb = config('database.redis.cache.database', 0);
        $pattern = '__keyevent@' . $cachedb . '__:expired';
        \Log::error('key'.$pattern);
        Redis::psubscribe([$pattern], function ($channel) {     // 订阅键过期事件
            \Log::error('---$channel---' . $channel);
            $key_type = str_before($channel, ':');
            switch ($key_type) {
                case 'ORDER_CONFIRM':
                    $order_id = str_after($channel, ':');    // 取出订单 ID
                    \Log::error('---order---' . $order_id);
//                    $order = Order::find($order_id);
//                    if ($order) {
//                        $order->cancel(); // 执行取消操作
//                    }
                    break;
                case 'ORDER_OTHEREVENT':
                    break;
                default:
                    break;
            }
        });
    }
}
