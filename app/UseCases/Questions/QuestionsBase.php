<?php

namespace App\UseCases\Questions;

use App\Entity\Cabinet\Victorians\Question;
use App\UseCases\Interfaces\QuestionsInterface;

class QuestionsBase implements QuestionsInterface
{
    private $questions;

    public function __construct()
    {
        $this->questions = new Question();
    }

    public function getInfo($request)
    {

        //всего кнопок
        $number = $request->number;
        if($number != '0' ){
            $btn = $request->toArray();
            $button['button'] = $btn['button0'];
            do {
                --$number;
                for($inc = '1';$inc <=$number;$inc++){

                    for($name = '1';$name <=$number;$name++){
                        $button['button'.$inc] =  $request['button'.$name];
                    }
                }
            }
            while($number !='0');
            $buttons = json_encode($button);

            return $post = [
                'name'         =>  $request->name,
                'victorians_id'=>  $request->victorians_id,
                'image'        =>  $request->image,
                'text' =>  $request->descriptions,
                'button'       =>  $buttons,
            ];
        };

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
