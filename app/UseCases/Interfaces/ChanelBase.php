<?php

namespace App\UseCases\Interfaces;

interface ChanelBase
{
    public function curl($url);

    public function check_admin_bot($url);

    public function save($chanel);

    public function update($chanel);

}