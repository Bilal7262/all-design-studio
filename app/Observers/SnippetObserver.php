<?php

namespace App\Observers;

use App\Models\Blog\Snippet;

class SnippetObserver
{
    /**
     * Handle the Snippet "created" event.
     */
    public function created(Snippet $snippet): void
    {
        //
    }

    /**
     * Handle the Snippet "updated" event.
     */
    public function updated(Snippet $snippet): void
    {
        // Check if a specific attribute has changed, e.g., the 'icon'
        if ($snippet->isDirty('icon')) {
            // Get the previous value of the 'icon'
            $oldProfileImgPath = $snippet->getOriginal('icon');
            
            // You can now use this old icon path for further processing (e.g., deleting the old file)
            removeOldFile($oldProfileImgPath);
        }
    }

    /**
     * Handle the Snippet "deleted" event.
     */
    public function deleted(Snippet $snippet): void
    {
        if (!is_null($snippet->icon) && !empty($snippet->icon)) {
            // Remove the old file if the icon is valid
            removeOldFile($snippet->icon);
        }
    }

    /**
     * Handle the Snippet "restored" event.
     */
    public function restored(Snippet $snippet): void
    {
        //
    }

    /**
     * Handle the Snippet "force deleted" event.
     */
    public function forceDeleted(Snippet $snippet): void
    {
        //
    }
}
