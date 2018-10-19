<?php

namespace App\Providers;

use App\Events\ExampleEvent;
use App\Events\Frontend\Chat\SendChatEvent;
use App\Events\Frontend\Order\OrderCreateEvent;
use App\Events\Frontend\Order\OrderUpdateEvent;
use App\Listeners\Frontend\Order\OrderCreateListener;
use App\Listeners\Frontend\Order\OrderUpdateListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class EventServiceProvider.
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        OrderCreateEvent::class => [
            OrderCreateListener::class
        ],
        OrderUpdateEvent::class => [
            OrderUpdateListener::class
        ],
        \App\Events\Backend\Order\OrderUpdateEvent::class => [
            \App\Listeners\Backend\Order\OrderUpdateListener::class
        ],
        SendChatEvent::class => [
            
        ]
        //ExampleEvent::class => []
    ];

    /**
     * Class event subscribers.
     *
     * @var array
     */
    protected $subscribe = [
        /*
         * Frontend Subscribers
         */

        /*
         * Auth Subscribers
         */
        \App\Listeners\Frontend\Auth\UserEventListener::class,

        /*
         * Backend Subscribers
         */

        /*
         * Access Subscribers
         */
        \App\Listeners\Backend\Access\User\UserEventListener::class,
        \App\Listeners\Backend\Access\Role\RoleEventListener::class,
        \App\Listeners\Backend\Access\Permission\PermissionEventListener::class,
        \App\Listeners\Backend\CMSPages\CMSPageEventListener::class,
        \App\Listeners\Backend\EmailTemplates\EmailTemplateEventListener::class,
        \App\Listeners\Backend\BlogCategories\BlogCategoryEventListener::class,
        \App\Listeners\Backend\BlogTags\BlogTagEventListener::class,
        \App\Listeners\Backend\Blogs\BlogEventListener::class,
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
