<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('superadmin', function(User $user){                 //Admin => administrator
            return $user->role === 'Super Admin';
        });

        Gate::define('adminposyandu', function(User $user){         //Pengurus
            return $user->role === 'Admin Posyandu';
        });

        Gate::define('orangtua', function(User $user){                  //Admin+Pengurus
            return $user->role !== 'Orang Tua';
        });
    }
}
