<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Passport::tokensExpireIn(now()->addDays(10));
        Passport::personalAccessTokensExpireIn(now()->addHours(24));
        Passport::refreshTokensExpireIn(now()->addDays(10));
    }
}
