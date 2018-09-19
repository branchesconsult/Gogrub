<?php

namespace App\Models\Image;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image\Traits\ImageAttribute;
use App\Models\Image\Traits\ImageRelationship;

class Image extends Model
{
    use ModelTrait,
        ImageAttribute,
        ImageRelationship {
        // ImageAttribute::getEditButtonAttribute insteadof ModelTrait;
    }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'images';
    public $timestamps = false;

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
    protected $guarded = [];

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function getImageUrlAttribute($val)
    {
        return asset(str_replace('public/', 'storage/', $val));
    }
}
