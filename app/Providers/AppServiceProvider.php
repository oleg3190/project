<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{

    public function boot()
    {
        Schema::defaultStringLength(191);

        Validator::extend('description', function ($attribute, $value, $parameters, $validator) {

            $parameters = strip_tags($value);// адрес канала
            $parameters = stripcslashes($parameters);
            $parameters = trim($parameters);
            $parameters = str_replace('https://t.me/', "", $parameters);
            $parameters = str_replace("@", "", $parameters);

            return $value == $parameters;
        });

        Validator::extend('token', function ($attribute, $value, $parameters, $validator) {

            $token = trim($value);
            $token = strip_tags($token);
            $token = stripcslashes($token);

            return $value == $token;
        });

    }

    public function register()
    {


    }
}
