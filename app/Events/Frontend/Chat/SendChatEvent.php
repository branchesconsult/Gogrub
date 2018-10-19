<?php

namespace App\Events\Frontend\Chat;

use App\Models\Chat\Chat;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendChatEvent implements ShouldBroadcast, ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $chat;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Chat $chat)
    {
        $this->chat = $chat;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return [
            'order-chat-' . $this->chat->order_id,
            'order-chat-1'
        ];
    }

//    /**
//     * Get the data to broadcast.
//     *
//     * @return array
//     */
//    public function broadcastWith()
//    {
//        return [
//            'chat' => $this->chat,
//            'message' => $this->chat->message,
//            'message_type' => 'Message',
//            'is_sender' => false //Chepi for android developer, Altough no sender recive the broadcast
//        ];
//    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'chat.receive';
    }
}
