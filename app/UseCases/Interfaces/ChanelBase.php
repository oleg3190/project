<?php

namespace App\UseCases\Interfaces;


interface ChanelBase
{
    public function curl($url);

    public function check_admin_bot($url);

}