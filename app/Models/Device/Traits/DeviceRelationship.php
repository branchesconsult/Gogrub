<?php

namespace App\Models\Device\Traits;
use App\Models\Access\User\User;

/**
 * Class DeviceRelationship
 */
trait DeviceRelationship
{
    /**
     * Get all of the owning devicable models.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
