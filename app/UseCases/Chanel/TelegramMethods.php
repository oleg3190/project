<?php

namespace app\UseCases\Chanel;

class TelegramMethods
{
    //Methods
    public $getMe = '/getMe';
    public $url = 'https://t.me/';
    public $botApi = 'https://api.telegram.org/bot';
    public $get_admin = '/getChatAdministrators?chat_id=@';
    public $getChat = '/getChat?chat_id=@';

}
