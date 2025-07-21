<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application Services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Services\Language\Interfaces\LanguageInterface::class,
            \App\Models\LanguageModel::class
        );

    }

    /**
     * Bootstrap any application Services.
     */
    public function boot(): void
    {
        //
    }
}
