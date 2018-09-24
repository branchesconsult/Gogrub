<?php

namespace App\Models\Location\Traits;

/**
 * Class LocationRelationship
 */
trait LocationRelationship
{
    public function locationable()
    {
        return $this->morphTo();
    }
}
