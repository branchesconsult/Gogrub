<?php

namespace App\Models\Product;

use App\Models\ModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Traits\ProductAttribute;
use App\Models\Product\Traits\ProductRelationship;

class Product extends Model
{
    use ModelTrait,
        ProductAttribute,
        ProductRelationship {
        // ProductAttribute::getEditButtonAttribute insteadof ModelTrait;
    }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'products';


    /**
     * Default values for model fields
     * @var array
     */
    protected $attributes = [

    ];

    /**
     * Dates
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * Guarded fields of model
     * @var array
     */
    protected $guarded = [

    ];

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }


    public function getGlobalDateTimeFormat($dateTime)
    {
        if ($this->skipMutator == true || empty($dateTime)) {
            return $dateTime;
        }
        return Carbon::parse($dateTime)->toDayDateTimeString();

    }

    public function getCreatedAtAttribute($val)
    {
        return $this->getGlobalDateTimeFormat($val);
    }

    public function getUpdatedAtAttribute($val)
    {
        return $this->getGlobalDateTimeFormat($val);
    }


    public function getAvailabilityFormAttribute($val)
    {
        return $this->getGlobalDateTimeFormat($val);
    }

    public function getAvailabilityToAttribute($val)
    {
        return $this->getGlobalDateTimeFormat($val);
    }
}
