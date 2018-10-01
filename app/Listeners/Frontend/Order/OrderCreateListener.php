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
        $this->createNotification($event);
    }

    public function createNotification($event)
    {
        createNotification(
            'Order has been created',
            $event->order->chef_id,
            Notification::ORDER_CREATE,
            $event->order->id);
    }
}
