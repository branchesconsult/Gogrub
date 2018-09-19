<?php

namespace App\Models\Product\Traits;

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
}
