<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/admin';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web/web.php'));

            Route::middleware(['web' , 'auth' ])
                ->prefix('users')
                ->group(base_path('routes/web/users.php'));

            Route::middleware(['web' , 'auth'])
                ->prefix('posts')
                ->group(base_path('routes/web/posts.php'));

            Route::middleware(['web' , 'auth'])
                ->prefix('roles')
                ->group(base_path('routes/web/roles.php'));

            Route::middleware(['web' , 'auth'])
                ->prefix('permissions')
                ->group(base_path('routes/web/permissions.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}