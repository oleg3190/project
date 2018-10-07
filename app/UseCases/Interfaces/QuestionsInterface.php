<?php

namespace App\UseCases\Interfaces;

interface QuestionsInterface
{
    public function getInfo($url);
    public function save($questions);

}