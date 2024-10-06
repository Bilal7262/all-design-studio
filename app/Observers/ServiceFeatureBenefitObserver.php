<?php

namespace App\Observers;

use App\Models\Blog\ServiceFeatureBenefit;

class ServiceFeatureBenefitObserver
{
    /**
     * Handle the ServiceFeatureBenefit "created" event.
     */
    public function created(ServiceFeatureBenefit $serviceFeatureBenefit): void
    {
        //
    }

    /**
     * Handle the ServiceFeatureBenefit "updated" event.
     */
    public function updated(ServiceFeatureBenefit $serviceFeatureBenefit): void
    {
        if ($serviceFeatureBenefit->isDirty('icon')) {
            // Get the previous value of the 'icon'
            $oldIconPath = $serviceFeatureBenefit->getOriginal('icon');
            
            // You can now use this old icon path for further processing (e.g., deleting the old file)
            removeOldFile($oldIconPath);
        }
    }

    /**
     * Handle the ServiceFeatureBenefit "deleted" event.
     */
    public function deleted(ServiceFeatureBenefit $serviceFeatureBenefit): void
    {
        if (!is_null($serviceFeatureBenefit->icon) && !empty($serviceFeatureBenefit->icon)) {
            // Remove the old file if the icon is valid
            removeOldFile($serviceFeatureBenefit->icon);
        }
    }

    /**
     * Handle the ServiceFeatureBenefit "restored" event.
     */
    public function restored(ServiceFeatureBenefit $serviceFeatureBenefit): void
    {
        //
    }

    /**
     * Handle the ServiceFeatureBenefit "force deleted" event.
     */
    public function forceDeleted(ServiceFeatureBenefit $serviceFeatureBenefit): void
    {
        //
    }
}
