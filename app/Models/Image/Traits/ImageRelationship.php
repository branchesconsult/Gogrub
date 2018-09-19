<?php

namespace App\Models\Image\Traits;

/**
 * Class ImageRelationship
 */
trait ImageRelationship
{
    public function imageable()
    {
        return $this->morphTo();
    }
}
