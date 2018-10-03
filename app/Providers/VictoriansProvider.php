<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class VictoriansProvider extends ServiceProvider
{

    public function boot()
    {
        //
    }


    public function register()
    {
        $this->app->bind('App\UseCases\Interfaces\VictoriansInterface', 'App\UseCases\Victorians\VictoriansBase');
    }
}
