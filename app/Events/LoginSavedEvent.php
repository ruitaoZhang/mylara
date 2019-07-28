<?php

namespace App\Events;

use App\Models\Login;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class LoginSavedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $login;

    public function __construct(Login $login)
    {
        $this->login = $login;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
