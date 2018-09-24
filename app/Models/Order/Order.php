<?php

namespace App\Models\Order;

use App\Models\ModelTrait;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order\Traits\OrderAttribute;
use App\Models\Order\Traits\OrderRelationship;

class Order extends Model
{
    use ModelTrait,
        OrderAttribute,
        SpatialTrait,
        OrderRelationship {
        // OrderAttribute::getEditButtonAttribute insteadof ModelTrait;
    }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'orders';


    /**
     * Default values for model fields
     * @var array
     */
    protected $attributes = [];

    /**
     * Dates
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    protected $spatialFields = [
        'customer_location',
        'chef_location'
    ];
    /**
     * Guarded fields of model
     * @var array
     */
    protected $guarded = [];

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    protected $appends = ['total'];

    public function getTotalAttribute()
    {
        return $this->subtotal + $this->delivery_charges;
    }

    public function setCustomerLocationAttribute($val)
    {
        $val = explode(',', $val);
        $this->attributes['customer_location'] = new Point($val[0], $val[1]);
    }

    public function setChefLocationAttribute($val)
    {
        $val = explode(',', $val);
        $this->attributes['chef_location'] = new Point($val[0], $val[1]);
    }


    public function setInvoiceNumAttribute($val)
    {
        $val = (empty($val)) ? 1 : ++$val;
        $this->attributes['invoice_num'] = $val;
    }
}
