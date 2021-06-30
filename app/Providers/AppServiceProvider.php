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
            if (trim($user->perfil) == 'n') {
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
        Gate::define('doc', function ($user) {
            if (trim($user->perfil) == 'D') {
                return true;
            }
            return false;
        });

        Gate::define('rec', function ($user) {
            if (trim($user->perfil) == 'R') {
                return true;
            }
            return false;
        });
        Gate::define('mec', function ($user) {
            if (trim($user->perfil) == 'M') {
                return true;
            }
            return false;
        });
        Gate::define('jmec', function ($user) {
            if (trim($user->perfil) == 'J') {
                return true;
            }
            return false;
        });
        Gate::define('fun', function ($user) {
            if (trim($user->perfil) == 'F') {
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
