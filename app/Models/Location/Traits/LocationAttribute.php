<?php

namespace App\Models\Location\Traits;

/**
 * Class LocationAttribute.
 */
trait LocationAttribute
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
                '.$this->getEditButtonAttribute("edit-location", "admin.locations.edit").'
                '.$this->getDeleteButtonAttribute("delete-location", "admin.locations.destroy").'
                </div>';
    }
}
