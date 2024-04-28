<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        $myVariable = 'Hello, World!';
        $this->app->singleton('myVariable', function () use ($myVariable) {
            return $myVariable;
        });


        Gate::define('auth_user_can_rent', function (User $user, $id) {
            return ($user->id != $id) ? Response::allow() : Response::deny("you can't rent your own property");
        });
    }
}
