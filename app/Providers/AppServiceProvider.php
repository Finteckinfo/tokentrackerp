<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

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
        Schema::defaultStringLength(191);
        if (Auth::check()) {
            View::share('loggedinuser', Auth::user());
            View::share('loggedinuserId', Auth::id());
            View::share('users', User::all());
        } else {
            View::share('loggedinuserId', null); // or handle accordingly
        }

    }
}
