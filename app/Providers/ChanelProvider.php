<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ChanelProvider extends ServiceProvider
{

    public function boot()
    {
        //
    }


    public function register()
    {
        $this->app->bind('App\UseCases\Chanel\Interfaces\ChanelBase', 'App\UseCases\Chanel\TelegramBase');
    }
}
