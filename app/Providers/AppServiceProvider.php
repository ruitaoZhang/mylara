<?php

namespace App\Providers;

use App\ioc\Keyboard;
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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \App::bind( 'Keyboard', function(){
            return new Keyboard;
        });
    }
}
