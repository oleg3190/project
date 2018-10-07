<?php

namespace App\UseCases\Questions;

use App\Entity\Cabinet\Channels\Channel;
use App\UseCases\Interfaces\QuestionsInterface;

class QuestionsService
{
    private $service;

    public function __construct(QuestionsInterface $service)
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