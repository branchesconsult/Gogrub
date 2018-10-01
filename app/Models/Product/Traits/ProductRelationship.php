<?php

namespace App\Models\Product\Traits;

use App\Models\Access\User\User;
use App\Models\Cuisine\Cuisine;
use App\Models\Image\Image;

/**
 * Class ProductRelationship
 */
trait ProductRelationship
{

    /**
     * Get all of the product's image.
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function chef()
    {
        return $this->belongsTo(User::class, 'chef_id');
    }

    public function cuisine()
    {
        return $this->belongsTo(Cuisine::class);
    }
}
