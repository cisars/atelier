<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        /*
         'App\Model' => 'App\Policies\ModelPolicy',
        */
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage())
                ->subject('Verifica tu correo | Atelier')
                ->line('Haz click en el botón de abajo para verificar tu correo')
                ->action('Verificar', $url);
        });
/*
        Auth::provider('custom_user', function ($app, array $config) {
            $model = $app['config']['auth.providers.users.model'];
            return new MyEloquentUserProvider($app['hash'], $model);
        });
*/
    }
}
