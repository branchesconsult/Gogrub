<?php

namespace App\Models\Image;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image\Traits\ImageAttribute;
use App\Models\Image\Traits\ImageRelationship;
use Unisharp\FileApi\FileApi;

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

    protected $hidden = [
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


    protected $appends = ['small_thumb', 'medium_thumb', 'image_large'];


    public function getImageLargeAttribute($val)
    {
        $fa = new FileApi();
        return $this->attributes['image_original'] = $this->fileApiUrl($fa->get($this->image_url, FileApi::SIZE_LARGE));
    }

    public function getSmallThumbAttribute($value)
    {
        $fa = new FileApi();
        return $this->attributes['small_thumb'] = $this->fileApiUrl($fa->get($this->image_url, FileApi::SIZE_SMALL));
    }

    public function getMediumThumbAttribute($value)
    {
        $fa = new FileApi();
        return $this->attributes['medium_thumb'] = $this->fileApiUrl($fa->get($this->image_url, FileApi::SIZE_MEDIUM));
    }

    public function fileApiUrl($fileDbPath)
    {
        return str_replace('/public/', '/storage/', asset(trim($fileDbPath, '/')));
    }

//    public function getImageUrlAttribute($val)
//    {
//        //return $this->fileApiUrl($val);
//    }
}
