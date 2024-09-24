<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        Gate::before(function ($user, $ability) {
            return $user->hasRole('admin') ? true : null;
        });
        // Gate::after(function ($user, $ability) {
        //     return $user->hasRole('Super-Admin'); // note this returns boolean
        //  });
        // Gate::after(function ($user, $ability) {
        //     return $user->hasRole('Super-Admin'); // note this returns boolean
        //  });
        
            // Implicitly grant "Super-Admin" role all permission checks using can()
        //  Gate::before(function ($user, $ability) {
        //          if($user->hasRole('Super-Admin')) {
        //              return true;
        //          }
        //      });
    }
}
