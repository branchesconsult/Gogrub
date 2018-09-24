<?php

namespace App\Models\OrderDetails;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends BaseModel
{
    protected $table = 'orderdetails';
    protected $guarded = [];

    protected $appends = ['total_price'];

    public function getTotalPriceAttribute()
    {
        return $this->qty * $this->price;
    }
}
