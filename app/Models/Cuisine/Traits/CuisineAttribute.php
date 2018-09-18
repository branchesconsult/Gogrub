<?php

namespace App\Models\Cuisine\Traits;

/**
 * Class CuisineAttribute.
 */
trait CuisineAttribute
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
                '.$this->getEditButtonAttribute("edit-cuisine", "admin.cuisines.edit").'
                '.$this->getDeleteButtonAttribute("delete-cuisine", "admin.cuisines.destroy").'
                </div>';
    }
}
