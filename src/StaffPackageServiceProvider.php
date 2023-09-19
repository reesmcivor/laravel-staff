<?php

namespace ReesMcIvor\Staff;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;
use ReesMcIvor\Staff\Nova\Staff;
use ReesMcIvor\Staff\View\Components\Grid;

class StaffPackageServiceProvider extends ServiceProvider
{
    protected $namespace = 'ReesMcIvor\Staff\Http\Controllers';

    public function boot()
    {
        $this->tenancyExists = function_exists('tenancy');

        if($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../database/migrations' => class_exists('Stancl\Tenancy\TenancyServiceProvider') ? database_path('migrations/tenant') : database_path('migrations'),
                __DIR__ . '/../publish/tests' => base_path('tests/Staff'),
            ], 'laravel-staff');
        }

        $this->loadViewsFrom(__DIR__.'/resources/views', 'staff');

        $this->loadViewComponentsAs('staff', [
            Grid::class
        ]);

        Nova::resources([
            Staff::class,
        ]);

        $this->mapRoutes();
    }

    private function mapRoutes()
    {
        Route::middleware(array_filter(['web', $this->tenancyExists ? 'tenant' : null]))
            ->namespace($this->namespace)
            ->group($this->modulePath('routes/web.php'));
    }

    private function modulePath($path)
    {
        return __DIR__ . "/" . $path;
    }
}
