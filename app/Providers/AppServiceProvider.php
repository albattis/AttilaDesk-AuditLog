<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\LogFileValidator\LogFileValidatorInterface;
use App\Services\LogFileValidator\LogFileValidator;

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
        $this->app->bind(LogFileValidatorInterface::class, LogFileValidator::class);

    }

    /**
     * Bootstrap any application Services.
     */
    public function boot(): void
    {
        //
    }
}
