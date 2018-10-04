<?php

namespace App\UseCases\Victorians;

use App\Entity\Cabinet\Victorians\Victorians;
use App\UseCases\Interfaces\VictoriansInterface;
use Illuminate\Support\Facades\Auth;

class VictoriansBase implements VictoriansInterface
{
    private $victorians;
    private $user_id = '1';

    public function __construct()
    {
        $this->victorians = new Victorians();
    }

    public function getInfo($request)
    {
        if(Auth::user()->id){
            $this->user_id = Auth::user()->id;
        }
        return $post = [
            'name'        => $request->name,
            'chanel'      => $request->chanel,
            'timeStart'   => $request->timeStart,
            'timeInterval'=> $request->timeInterval,
            'timeStop'    => $request->timeStop,
            'user_id'    =>  $this->user_id
        ];


    }

    public function save($victorians){

        $this->victorians->fill($victorians);
        if($this->victorians->save()){
            return true;
        }else{
            return false;
        }
    }


}
