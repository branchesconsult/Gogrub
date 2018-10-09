<?php

namespace App\Models\Notification;

use App\Models\BaseModel;

class Notification extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'notifications';

    const ORDER_CREATE = 'order_create';
    const ORDER_UPDATE = 'order_update';

    protected $guarded = [];

    public function __construct()
    {
        //$this->table = config('access.notifications_table');
    }
}
