<?php

namespace App\Observers;

use App\Models\Blog\ServiceImage;

class ServiceImageObserver
{
    /**
     * Handle the ServiceImage "created" event.
     */
    public function created(ServiceImage $serviceImage): void
    {
        //
    }

    /**
     * Handle the ServiceImage "updated" event.
     */
    public function updated(ServiceImage $serviceImage): void
    {
        if ($serviceImage->isDirty('image')) {
            // Get the previous value of the 'image'
            $oldProfileImgPath = $serviceImage->getOriginal('image');
            
            // You can now use this old image path for further processing (e.g., deleting the old file)
            removeOldFile($oldProfileImgPath);
        }
    }

    /**
     * Handle the ServiceImage "deleted" event.
     */
    public function deleted(ServiceImage $serviceImage): void
    {
        if (!is_null($serviceImage->image) && !empty($serviceImage->image)) {
            // Remove the old file if the image is valid
            removeOldFile($serviceImage->image);
        }
    }

    /**
     * Handle the ServiceImage "restored" event.
     */
    public function restored(ServiceImage $serviceImage): void
    {
        //
    }

    /**
     * Handle the ServiceImage "force deleted" event.
     */
    public function forceDeleted(ServiceImage $serviceImage): void
    {
        //
    }
}
