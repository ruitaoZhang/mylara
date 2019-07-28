<?php

namespace App\Listeners;

use App\Models\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class LoginSaved
{
    public function __construct()
    {

    }

    public function handle($event)
    {
        Log::error('我是通過listener監聽到的');
        Log::error($event->login);
    }
}
