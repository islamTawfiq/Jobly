<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    // public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        $this->mapBrokerRoutes();

        $this->mapAgencyRoutes();

        $this->mapSponsorRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::middleware(['web','admin','lang','customizer'])
            ->prefix('admin')
            ->namespace($this->namespace."\Admin")
            ->group(base_path('routes/admin.php'));
    }
    protected function mapAgencyRoutes()
    {
        Route::middleware(['web','agency'])
            ->prefix('agency-dashboard')
            ->namespace($this->namespace."\site")
            ->group(base_path('routes/agency.php'));
    }
    protected function mapSponsorRoutes()
    {
        Route::middleware(['web','sponsor'])
            ->prefix('sponsor-dashboard')
            ->namespace($this->namespace."\site")
            ->group(base_path('routes/sponsor.php'));
    }
    protected function mapBrokerRoutes()
    {
        Route::middleware(['web','broker'])
            ->prefix('broker-dashboard')
            ->namespace($this->namespace."\site")
            ->group(base_path('routes/broker.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
