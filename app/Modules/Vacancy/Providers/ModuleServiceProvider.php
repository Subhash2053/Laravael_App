<?php

namespace App\Modules\Vacancy\Providers;

use App\Modules\Vacancy\Repositories\VacancyInterface;
use App\Modules\Vacancy\Repositories\VacancyRepository;
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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'vacancy');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'vacancy');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'vacancy');
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
        $this->vacancyRegister();
    }
    public function vacancyRegister(){
        $this->app->bind(VacancyInterface::class, VacancyRepository::class);
    }
}
