<?php

namespace App\Models\Order;

use App\Models\BaseModel;
use App\Models\ModelTrait;
use Carbon\Carbon;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order\Traits\OrderAttribute;
use App\Models\Order\Traits\OrderRelationship;

class Order extends BaseModel
{
    use ModelTrait,
        OrderAttribute,
        SpatialTrait,
        OrderRelationship {
        // OrderAttribute::getEditButtonAttribute insteadof ModelTrait;
    }

    const ORDER_ACTIVE = 2;
    const ORDER_PENDING = 1;
    const ORDER_CANCELLED = 4;
    const ORDER_DELIEVRED = 3;

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'orders';

    protected $casts = [
        'float' => 'subtotal'
    ];

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

    protected $appends = ['total', 'posted_at', 'avg_rating', 'has_rated'];

    public function getTotalAttribute()
    {
        return numToDecimal($this->subtotal + $this->delivery_charges);
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

    public function getSubtotalAttribute($val)
    {
        return numToDecimal($val);
    }


    public function getCreatedAtAttribute($val)
    {
        return $this->getGlobalDateTimeFormat($val);
    }

    public function getPostedAtAttribute()
    {
        return Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
    }

    public function getAvgRatingAttribute()
    {
        return number_format($this->ratingReviews()->avg('rating')) ?? 0.00;
    }

    public function getHasRatedAttribute()
    {
        return (boolean)$this->ratingReview()->count();
    }
}
