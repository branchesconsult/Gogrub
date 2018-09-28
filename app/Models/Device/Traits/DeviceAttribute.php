<?php

namespace App\Models\Device\Traits;

/**
 * Class DeviceAttribute.
 */
trait DeviceAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-device", "admin.devices.edit").'
                '.$this->getDeleteButtonAttribute("delete-device", "admin.devices.destroy").'
                </div>';
    }
}
