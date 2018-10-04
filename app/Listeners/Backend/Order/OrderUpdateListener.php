<?php

namespace App\Listeners\Backend\Order;

use App\Events\Backend\Order\OrderUpdateEvent;
use App\Models\Device\Device;
use App\Models\Notification\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderUpdateListener implements ShouldQueue
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
     * @param  OrderUpdateEvent $event
     * @return void
     */
    public function handle(OrderUpdateEvent $event)
    {
        createNotification(
            'Order has been created',
            $event->order->chef_id,
            Notification::ORDER_CREATE,
            $event->order->id);
        $chefDeviceToken = Device::where('user_id', $event->order->customer_id)->get(['fcm_token']);
        sendPushNotificationToFCMSever($chefDeviceToken, 'Your order status has changed.');
    }
}
