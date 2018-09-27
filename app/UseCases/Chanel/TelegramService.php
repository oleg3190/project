<?php

namespace App\UseCases\Chanel;
use App\Entity\Cabinet\Channels\Channel;
use App\Http\Requests\TelegramRequest;

use App\UseCases\Chanel\Interfaces\ChanelBase as ChanelInterface;


class TelegramService
{
    public $chanel;
    public $methods;

    public function __construct(ChanelInterface $chanelBase, TelegramMethods $methods)
    {
        $this->chanel = $chanelBase;
        $this->methods = $methods;

    }

    public function ChanelAdd($request){

        $token   = $request['token'];
        $address = $request['description'];

        $valid_chanel_check = $this->chanel->curl($this->methods->url. $address);
        $valid_chanel_check = strpos($valid_chanel_check ,'members');

        if($valid_chanel_check !== false){

            //проверка токена
            $check_token = $this->chanel
                ->curl($this->methods->botApi. $token. $this->methods->getMe);

            $check_token = json_decode($check_token,true);

            if ($check_token['ok']) {

                //получаем имя канала
                $get_channel_name =$this->chanel
                    ->curl($this->methods->botApi. $token. $this->methods->getChat. $address);

                $get_channel_name = json_decode($get_channel_name, true);
                $channel_name = $get_channel_name['result']['title'];


                //проверяем является ли бот администратором
                $check_admin_bot = $this->chanel
                    ->curl($this->methods->botApi. $token .$this->methods->get_admin. $address);

                $check_admin_bot = $this->chanel
                    ->check_admin_bot($check_admin_bot);


                if($check_admin_bot !== false){
                    //сохраняемый пакет
                    $post = [
                        'name'        => $channel_name,
                        'description' => $address,
                        'token'       => $token
                    ];

                    //сохраняем полученные данные
                    $channel = new Channel();
                    $channel->fill($post);

                    if ($channel->save()) {
                        return $save = 'Сохранен';
                    }

                }else{
                    return $save = 'нет прав';
                }

            } else {
                return $save = 'неправильный токен';
            }


        }else {
            return $save = 'нет канала';


    }}


    public function TokenEdit($request){

        $token   = $request['description'];
        $address = $request['token'];

        //проверяем является ли бот администратором
        $check_admin_bot = $this->chanel
            ->curl($this->methods->botApi. $token .$this->methods->get_admin. $address);

        if ($check_admin_bot !== false) {
            //сохраняемый пакет
            $post = [
                'token' => $token
            ];
            $channel = new Channel();
            $channel->fill($post);

            if ($channel->update()) {
                    return $save = 'обновлен';
            }else{
                return $save = 'нет прав';
            }

    }
    }

}