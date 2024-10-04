<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Blog\{Snippet, ServiceImage};
use App\Observers\{SnippetObserver, ServiceImageObserver};


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        Snippet::observe(SnippetObserver::class);
        ServiceImage::observe(ServiceImageObserver::class);
    }
}
