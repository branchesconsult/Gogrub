<?php

namespace App\Listeners\Frontend\Chat;

use App\Events\Frontend\Chat\SendChatEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendChatEventListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(SendChatEvent $event)
    {
        \Log::info(print_r($event->toArray(), true));
    }

    /**
     * Handle the event.
     *
     * @param  object $event
     * @return void
     */
    public function handle($event)
    {
        //
    }
}
