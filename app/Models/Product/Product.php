<?php

namespace App\Models\Product;

use App\Models\ModelTrait;
use App\Models\OrderDetails\OrderDetail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Traits\ProductAttribute;
use App\Models\Product\Traits\ProductRelationship;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use ModelTrait,
        ProductAttribute,
        HasSlug,
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

    protected $appends = [
        'remaining_servings',
        'posted_at', 'price_view',
        'availability_time',
        'servings_left',
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


//    public function getAvailabilityFormAttribute($val)
//    {
//        return $this->getGlobalDateTimeFormat($val);
//    }

//    public function getAvailabilityToAttribute($val)
//    {
//        return $this->getGlobalDateTimeFormat($val);
//    }

    public function getRemainingServingsAttribute()
    {
        $totalSold = OrderDetail::where('product_id', $this->id)->get()->count();
        $remainingServings = max($this->total_servings - $totalSold, 0);
        return $remainingServings;
    }


    public function getPostedAtAttribute()
    {
        return Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
    }

    public function getPriceViewAttribute()
    {
        return 'Rs ' . number_format($this->price);
    }

    public function getAvailabilityTimeAttribute()
    {
        return Carbon::parse($this->availability_from)->toDayDateTimeString() . ' - ' . Carbon::parse($this->availability_to)->toDayDateTimeString();
    }

    /**
     * Servings left
     */
    public function getServingsLeftAttribute()
    {
        return $this->id - 1;
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions()
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
