<?php

namespace App\Models\Order\Traits;

/**
 * Class OrderAttribute.
 */
trait OrderAttribute
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
                '.$this->getEditButtonAttribute("edit-order", "admin.orders.edit").'
                '.$this->getDeleteButtonAttribute("delete-order", "admin.orders.destroy").'
                </div>';
    }
}
