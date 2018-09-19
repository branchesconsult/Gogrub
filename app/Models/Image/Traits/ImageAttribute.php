<?php

namespace App\Models\Image\Traits;

/**
 * Class ImageAttribute.
 */
trait ImageAttribute
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
                '.$this->getEditButtonAttribute("edit-image", "admin.images.edit").'
                '.$this->getDeleteButtonAttribute("delete-image", "admin.images.destroy").'
                </div>';
    }
}
