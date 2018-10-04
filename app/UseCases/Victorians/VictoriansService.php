<?php

namespace App\UseCases\Victorians;
use App\Entity\Cabinet\Channels\Channel;
use App\Entity\Cabinet\Victorians\Victorians;
use App\UseCases\Interfaces\VictoriansInterface;

class VictoriansService
{
    private $service;

    public function __construct(VictoriansInterface $service)
    {
        $this->service = $service;
    }

    public function create($request){
        $victorians = $this->service->getInfo($request);
        if($victorians){
            $victorians = $this->service->save($victorians);
            return $victorians;
        }
    }



}