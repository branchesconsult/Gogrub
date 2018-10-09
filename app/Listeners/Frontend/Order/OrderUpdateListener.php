<?php

namespace App\Listeners\Frontend\Order;

use App\Events\Frontend\Order\OrderUpdateEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderUpdateListener
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
     * @param  object $event
     * @return void
     */
    public function handle(OrderUpdateEvent $event)
    {
        //
    }
}
