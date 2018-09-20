<?php

namespace App\Entity\Cabinet\Channels;
use Illuminate\Database\Eloquent\Model;


class Channel extends Model
{
    protected $table = 'channels';

    protected $fillable = ['token','description','name','user_id'];


    public function saveChanel($chanel){
        $channel = new Channel();
        $channel->fill($chanel);
    }



}


