<?php

namespace App\Entity\Cabinet\Channels;
use Illuminate\Database\Eloquent\Model;


class Channel extends Model
{
    protected $table = 'channels';

    protected $fillable = ['token','description','name','user_id'];


    //Methods
    public $getMe = '/getMe';
    const url = 'https://t.me/';
    const botApi = 'https://api.telegram.org/bot';
    const get_admin = '/getChatAdministrators?chat_id=@';
    const getChat = '/getChat?chat_id=@';



}


