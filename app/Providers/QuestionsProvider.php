<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class QuestionsProvider extends ServiceProvider
{

    public function boot()
    {
        //
    }


    public function register()
    {
        $this->app->bind('App\UseCases\Interfaces\QuestionsInterface', 'App\UseCases\Questions\QuestionsBase');
    }
}
