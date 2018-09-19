<?php

namespace App\Listeners\Backend\Order;

use App\Events\Backend\Order\orderCreate;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class orderCreateListener
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
     * @param  orderCreate  $event
     * @return void
     */
    public function handle(orderCreate $event)
    {
        //
    }
}
