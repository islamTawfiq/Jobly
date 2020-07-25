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

        $this->mapImportAgencyRoutes();

        $this->mapExportAgencyRoutes();

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
        Route::middleware(['web','admin','customizer'])
            ->prefix('admin')
            ->namespace($this->namespace."\Admin")
            ->group(base_path('routes/admin.php'));
    }
    protected function mapImportAgencyRoutes()
    {
        Route::middleware(['web','importAgency'])
            ->prefix('import-agency-dashboard')
            ->namespace($this->namespace."\Site\dashboard\importAgency")
            ->group(base_path('routes/importAgency.php'));
    }
    protected function mapExportAgencyRoutes()
    {
        Route::middleware(['web','exportAgency'])
            ->prefix('export-agency-dashboard')
            ->namespace($this->namespace."\Site\dashboard\ExportAgency")
            ->group(base_path('routes/exportAgency.php'));
    }
    protected function mapSponsorRoutes()
    {
        Route::middleware(['web','sponsor'])
            ->prefix('sponsor-dashboard')
            ->namespace($this->namespace."\Site\dashboard\sponsor")
            ->group(base_path('routes/sponsor.php'));
    }
    protected function mapBrokerRoutes()
    {
        Route::middleware(['web','broker'])
            ->prefix('broker-dashboard')
            ->namespace($this->namespace."\Site\dashboard\broker")
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
