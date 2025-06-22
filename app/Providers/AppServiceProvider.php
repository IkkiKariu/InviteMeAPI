<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

use App\Services\TokenAuthService;
use App\Services\ServiceService;
use App\Services\ServicePhotoService;
use App\Models\PersonalAccessToken;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TokenAuthService::class, function () {
            return new TokenAuthService;
        });
        $this->app->bind(ServiceService::class, function () {
            return new ServiceService;
        });
        $this->app->bind(ServicePhotoService::class, function () {
            return new ServicePhotoService;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }
}
