<?php

namespace App\UseCases\Interfaces;

interface VictoriansInterface
{
    public function getInfo($url);
    public function save($victorians);

}