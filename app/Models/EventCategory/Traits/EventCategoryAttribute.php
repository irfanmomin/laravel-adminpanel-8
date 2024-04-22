<?php

namespace App\Models\EventCategory\Traits;

/**
 * Class EventCategoryAttribute.
 */
trait EventCategoryAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/6.x/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn"> {$this->getEditButtonAttribute("edit-eventcategory", "admin.eventcategories.edit")}
                {$this->getDeleteButtonAttribute("delete-eventcategory", "admin.eventcategories.destroy")}
                </div>';
    }
}
