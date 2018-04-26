<?php

namespace App\Modules\Employee\Providers;

use App\Modules\Employee\Repositories\EmployeeInterface;
use App\Modules\Employee\Repositories\EmployeeRepository;
use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'employee');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'employee');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'employee');
        $this->loadConfigsFrom(__DIR__.'/../config');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->employeeRegister();
    }
    public function employeeRegister(){
        $this->app->bind(EmployeeInterface::class, EmployeeRepository::class);
    }
}
