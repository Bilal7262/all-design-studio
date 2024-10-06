<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Blog\{Snippet, ServiceImage, ServiceFeatureBenefit};
use App\Observers\{SnippetObserver, ServiceImageObserver, ServiceFeatureBenefitObserver};


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
        ServiceFeatureBenefit::observe(ServiceFeatureBenefitObserver::class);
    }
}
