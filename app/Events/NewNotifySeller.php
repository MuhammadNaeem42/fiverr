<?php

namespace App\Events;


use Illuminate\Broadcasting\InteractsWithSockets;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewNotifySeller implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $title;
    public $body;
    public $notify_id;
    public $ids;

    public function __construct($message)
    {
        $this->title = $message['title'];
        $this->body = $message['body'];
        $this->notify_id = $message['notify_id'];
        $this->ids = $message['ids'];
    }


    public function broadcastOn()
    {
        return ['new-Notify-Message-Seller'];
    }
}
