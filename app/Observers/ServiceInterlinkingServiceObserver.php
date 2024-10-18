<?php

namespace App\Observers;

use App\Models\Blog\ServiceInterlinkingService;

class ServiceInterlinkingServiceObserver
{
    /**
     * Handle the ServiceInterlinkingService "created" event.
     */
    public function created(ServiceInterlinkingService $serviceInterlinkingService): void
    {
        //
    }

    /**
     * Handle the ServiceInterlinkingService "updated" event.
     */
    public function updated(ServiceInterlinkingService $serviceInterlinkingService): void
    {
        if ($serviceInterlinkingService->isDirty('image')) {
            // Get the previous value of the 'image'
            $oldProfileImgPath = $serviceInterlinkingService->getOriginal('image');
            
            // You can now use this old image path for further processing (e.g., deleting the old file)
            removeOldFile($oldProfileImgPath);
        }
    }

    /**
     * Handle the ServiceInterlinkingService "deleted" event.
     */
    public function deleted(ServiceInterlinkingService $serviceInterlinkingService): void
    {
        if (!is_null($$serviceInterlinkingService->image) && !empty($$serviceInterlinkingService->image)) {
            // Remove the old file if the image is valid
            removeOldFile($$serviceInterlinkingService->image);
        }
    }

    /**
     * Handle the ServiceInterlinkingService "restored" event.
     */
    public function restored(ServiceInterlinkingService $serviceInterlinkingService): void
    {
        //
    }

    /**
     * Handle the ServiceInterlinkingService "force deleted" event.
     */
    public function forceDeleted(ServiceInterlinkingService $serviceInterlinkingService): void
    {
        //
    }
}
