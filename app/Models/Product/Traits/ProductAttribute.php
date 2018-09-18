<?php

namespace App\Models\Product\Traits;

/**
 * Class ProductAttribute.
 */
trait ProductAttribute
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
                '.$this->getEditButtonAttribute("edit-product", "admin.products.edit").'
                '.$this->getDeleteButtonAttribute("delete-product", "admin.products.destroy").'
                </div>';
    }
}
