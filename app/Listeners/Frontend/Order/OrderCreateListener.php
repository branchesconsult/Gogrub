<?php

namespace App\Listeners\Frontend\Order;

use App\Events\Frontend\Order\OrderCreateEvent;
use App\Models\Device\Device;
use App\Models\Notification\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCreateListener implements ShouldQueue
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
        $chefDeviceToken = Device::where('user_id', $event->order->chef_id)->get(['fcm_token']);
        sendPushNotificationToFCMSever($chefDeviceToken, 'You have a new order');
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
