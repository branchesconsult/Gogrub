<?php

namespace App\Listeners\Frontend\Chat;

use App\Events\Frontend\Chat\SendChatEvent;
use App\Models\Device\Device;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use phpDocumentor\Reflection\Types\Null_;

class SendChatEventListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(SendChatEvent $event)
    {
        return false;
    }

    /**
     * Handle the event.
     *
     * @param  object $event
     * @return void
     */
    public function handle($event)
    {
        $recieverToken = Device::where('user_id', $event->chat->receiver_id)->get(['fcm_token']);
        sendPushNotificationToFCMSever($recieverToken, $event->chat->message, 'chat_message', null, $event->chat);
        return false;
    }
}
