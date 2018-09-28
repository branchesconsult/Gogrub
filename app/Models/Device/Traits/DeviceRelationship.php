<?php

namespace App\Models\Device\Traits;

/**
 * Class DeviceRelationship
 */
trait DeviceRelationship
{
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
