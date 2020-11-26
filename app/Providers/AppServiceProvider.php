<?php

namespace App\Providers;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // EXCEPCION PARA HEROKU
//        if ($this->app->environment() !== 'production') {
//            $this->app->register(IdeHelperServiceProvider::class);
//        }
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->register();

        Gate::define('manage-blog', function ($user) {
            if (trim($user->perfil) == 'm') {
                return true;
            }
            return false;
        });
        Gate::define('admin', function ($user) {
            if (trim($user->perfil) == 'A') {
                return true;
            }
            return false;
        });
        Gate::define('example-bootstrap', function ($user) {
            if (trim($user->perfil) == 'B') {
                return true;
            }
            return false;
        });
    }
}
