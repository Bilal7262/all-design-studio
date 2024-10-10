<?php

namespace App\Observers;

use App\Models\ServiceSampleLogo;

class ServiceSampleLogoObserver
{
    /**
     * Handle the ServiceSampleLogo "created" event.
     */
    public function created(ServiceSampleLogo $serviceSampleLogo): void
    {
        //
    }

    /**
     * Handle the ServiceSampleLogo "updated" event.
     */
    public function updated(ServiceSampleLogo $serviceSampleLogo): void
    {
        if (!is_null($serviceSampleLogo->image) && !empty($serviceSampleLogo->image)) {
            // Remove the old file if the image is valid
            removeOldFile($serviceSampleLogo->image);
        }
    }

    /**
     * Handle the ServiceSampleLogo "deleted" event.
     */
    public function deleted(ServiceSampleLogo $serviceSampleLogo): void
    {
        if (!is_null($serviceSampleLogo->image) && !empty($serviceSampleLogo->image)) {
            // Remove the old file if the image is valid
            removeOldFile($serviceSampleLogo->image);
        }
    }

    /**
     * Handle the ServiceSampleLogo "restored" event.
     */
    public function restored(ServiceSampleLogo $serviceSampleLogo): void
    {
        //
    }

    /**
     * Handle the ServiceSampleLogo "force deleted" event.
     */
    public function forceDeleted(ServiceSampleLogo $serviceSampleLogo): void
    {
        //
    }
}
