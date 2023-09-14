<?php

namespace App\Providers;

use App\Services\V1\Movies\MovieService;
use App\Services\V1\Movies\IMovieService;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(IMovieService::class, MovieService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
