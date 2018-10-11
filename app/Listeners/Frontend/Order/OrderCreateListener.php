<?php

namespace App\Listeners\Frontend\Order;

use App\Events\Frontend\Order\OrderCreateEvent;
use App\Models\Device\Device;
use App\Models\Notification\Notification;
use App\Models\Order\Order;
use App\Models\Settings\Setting;
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
        Order::find($event->order->id)->gogrub_commission = Setting::where('setting_meta', Setting::DEFAULT_GOGRUB_COMMISSION)
            ->first()
            ->setting_value;
        $chefDeviceToken = Device::where('user_id', $event->order->chef_id)->get(['fcm_token']);
        $customerDeviceToken = Device::where('user_id', $event->order->customer_id)->get(['fcm_token']);
        sendPushNotificationToFCMSever($chefDeviceToken, 'You have a new order');
        sendPushNotificationToFCMSever($customerDeviceToken, 'Your order has been placed sexfully');
    }

    public function createNotification($event)
    {
        createNotification(
            'Order has been created',
            $event->order->chef_id,
            Notification::ORDER_CREATE,
            $event->order->id,
            [],
            $event->order->customer_id
        );
    }
}
