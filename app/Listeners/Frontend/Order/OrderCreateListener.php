<?php

namespace App\Listeners\Frontend\Order;

use App\Events\Frontend\Order\OrderCreateEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCreateListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderCreateEvent $event
     * @return void
     */
    public function handle(OrderCreateEvent $event)
    {
        \Log::debug('i am log', []);
    }
}
