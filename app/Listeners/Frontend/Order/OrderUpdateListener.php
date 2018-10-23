<?php

namespace App\Listeners\Frontend\Order;

use App\Events\Frontend\Order\OrderUpdateEvent;
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
     * @param  object $event
     * @return void
     */
    public function handle(OrderUpdateEvent $event)
    {
        $this->createNotification($event);
        $chefDeviceToken = Device::where('user_id', $event->order->chef_id)->get(['fcm_token']);
        $customerDeviceToken = Device::where('user_id', $event->order->customer_id)->get(['fcm_token']);
        sendPushNotificationToFCMSever($chefDeviceToken, 'You have updated order', 'chefOrderUpdated', null, $event->order);
        sendPushNotificationToFCMSever($customerDeviceToken, 'Your order has been updated.', 'customerOrderUpdated', null, $event->order);
        return false;
    }


    public function createNotification($event)
    {
        createNotification(
            'Order has been created',
            $event->order->customer_id,
            Notification::ORDER_UPDATE,
            $event->order->id,
            [],
            $event->order->chef_id
        );
    }
}
