<?php

namespace App\Modules\User\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // You may register any additional middleware provided with your
        // module with the following addMiddleware() method. You may
        // pass in either an array or a string.
        // $this->addMiddleware('');
    }

    /**
     * Register the User module service provider.
     *
     * @return void
     */
    public function register()
    {
        // This service provider is a convenient place to register your modules
        // services in the IoC container. If you wish, you may make additional
        // methods or service providers to keep the code more focused and granular.
        App::register('App\Modules\User\Providers\RouteServiceProvider');

        $this->registerNamespaces();

        $this->roleRegister();
        $this->permissionRegister();
    }

    /**
     * Register the User module resource namespaces.
     *
     * @return void
     */
    protected function registerNamespaces()
    {
        Lang::addNamespace('user', realpath(__DIR__ . '/../Resources/Lang'));

        View::addNamespace('user', base_path('resources/views/vendor/user'));
        View::addNamespace('user', realpath(__DIR__ . '/../Resources/Views'));
    }

    /**
     * Register any additional module middleware.
     *
     * @param  array|string $middleware
     * @return void
     */
    protected function addMiddleware($middleware)
    {
        $kernel = $this->app['Illuminate\Contracts\Http\Kernel'];

        if (is_array($middleware)) {
            foreach ($middleware as $ware) {
                $kernel->pushMiddleware($ware);
            }
        } else {
            $kernel->pushMiddleware($middleware);
        }
    }

    public function roleRegister()
    {
        $this->app->bind(

            'App\Modules\User\Repositories\RoleInterface',
            'App\Modules\User\Repositories\RoleRepository'
        );
    }

    public function permissionRegister()
    {
        $this->app->bind(

            'App\Modules\User\Repositories\PermissionInterface',
            'App\Modules\User\Repositories\PermissionRepository'
        );
    }
}
