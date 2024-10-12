<?php

namespace App\Observers;

use App\Models\Blog\ServicePriceCard;

class ServicePriceCardObserver
{
    /**
     * Handle the ServicePriceCard "created" event.
     */
    public function created(ServicePriceCard $servicePriceCard): void
    {
        //
    }

    /**
     * Handle the ServicePriceCard "updated" event.
     */
    public function updated(ServicePriceCard $servicePriceCard): void
    {
        if ($servicePriceCard->isDirty('image')) {
            // Get the previous value of the 'image'
            $oldProfileImgPath = $servicePriceCard->getOriginal('image');
            
            // You can now use this old image path for further processing (e.g., deleting the old file)
            removeOldFile($oldProfileImgPath);
        }
    }

    /**
     * Handle the ServicePriceCard "deleted" event.
     */
    public function deleted(ServicePriceCard $servicePriceCard): void
    {
        if (!is_null($servicePriceCard->image) && !empty($servicePriceCard->image)) {
            // Remove the old file if the image is valid
            removeOldFile($servicePriceCard->image);
        }
    }

    /**
     * Handle the ServicePriceCard "restored" event.
     */
    public function restored(ServicePriceCard $servicePriceCard): void
    {
        //
    }

    /**
     * Handle the ServicePriceCard "force deleted" event.
     */
    public function forceDeleted(ServicePriceCard $servicePriceCard): void
    {
        //
    }
}
