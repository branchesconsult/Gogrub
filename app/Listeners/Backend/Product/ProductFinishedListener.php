<?php

namespace App\Listeners\Backend\Product;

use App\Events\Backend\Product\ProductFinished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductFinishedListener
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
     * @param  ProductFinished  $event
     * @return void
     */
    public function handle(ProductFinished $event)
    {
        //
    }
}
