<?php

namespace App\UseCases\Chanel\Interfaces;

interface ChanelBase
{
    public function curl($url);

    public function check_admin_bot($url);

}