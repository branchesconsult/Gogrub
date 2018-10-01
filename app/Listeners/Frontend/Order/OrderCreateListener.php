<?php

namespace App\Listeners\Frontend\Order;

use App\Events\Frontend\Order\OrderCreateEvent;
use App\Models\Notification\Notification;
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

    public function createNotification(OrderCreateEvent $event)
    {
        createNotification('Order has been created', Notification::ORDER_CREATE);
    }
}
