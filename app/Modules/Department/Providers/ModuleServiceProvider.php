<?php

namespace App\Modules\Department\Providers;

use App\Modules\Department\Repositories\DepartmentInterface;
use App\Modules\Department\Repositories\DepartmentRepository;
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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'department');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'department');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'department');
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
        $this->departmentRegister();
    }
    public function departmentRegister(){
        $this->app->bind(DepartmentInterface::class, DepartmentRepository::class);
    }
}
