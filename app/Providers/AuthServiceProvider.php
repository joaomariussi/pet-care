<?php

namespace App\Providers;

 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {

            if($ability === 'free-access') {
                return true;
            }

            if($ability === $user->type) {
                return true;
            }

            if($user->type === 'webmaster') {
                return true;
            }

            if($user->type === 'admin') {
                return true;
            }
            return false;
        });
    }
}
