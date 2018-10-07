<?php

namespace App\UseCases\Questions;

use App\Entity\Cabinet\Victorians\Question;
use App\UseCases\Interfaces\QuestionsInterface;
use Illuminate\Support\Facades\Auth;

class QuestionsBase implements QuestionsInterface
{
    private $questions;

    public function __construct()
    {
        $this->questions = new Question();
    }


    public function getInfo($request)
    {
        $inc = 1;

        if($request->button.$inc){
            $buttons = [
              'button'=>''
            ];
        }

        return $post = [
            'name'         =>  $request->name,
            'victorians_id'=>  $request->victorians_id,
            'image'        =>  $request->image,
            'descriptions' =>  $request->descriptions,
            'button'       =>  $buttons,
        ];


    }

    public function save($questions){

        $this->questions->fill($questions);
        if($this->questions->save()){
            return true;
        }else{
            return false;
        }
    }


}
