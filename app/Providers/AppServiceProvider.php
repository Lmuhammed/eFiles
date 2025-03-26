<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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
        //Using Bootstrap for pagination styling
        Paginator::useBootstrapFive();

        /* define a admin user role */

        Gate::define('isAdmin', function($user) {

           return $user->role == 'admin';

        });

       

        /* define a manager user role */

        Gate::define('isManager', function($user) {

            return $user->role == 'manager';

        });

      

        /* define a isEmployee role */

        Gate::define('isEmployee', function($user) {

            return $user->role == 'employee';

        });

    
    }
}
