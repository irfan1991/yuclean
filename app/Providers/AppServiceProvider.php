<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        
            \Validator::extend('passcheck', function ($attribute, $value, $parameters) {
            return \Hash::check($value, $parameters[0]);
            });
            
             \View::composer('*', 'App\Http\ViewComposers\CartComposer');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
