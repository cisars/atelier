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
        if ($this->app->environment() !== 'production') {
            $this->app->register(IdeHelperServiceProvider::class);
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
            if ($user->tipo == 'm') {
                return true;
            }
            return false;
        });
        Gate::define('admin', function ($user) {
            if ($user->tipo == 1) {
                return true;
            }
            return false;
        });
        Gate::define('example-bootstrap', function ($user) {
            if ($user->tipo == 'B') {
                return true;
            }
            return false;
        });
    }
}
