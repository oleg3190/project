<?php

namespace app\UseCases\Chanel;
use App\Entity\Cabinet\Channels\Channel;
use App\Http\Requests\TelegramRequest;
use app\UseCases\Chanel\TelegramBase as ChanelBase;
//use App\UseCases\Interfaces\ChanelBase;

class TelegramService
{
    public $token;
    public $address;
    public $chanel;
    public $methods;

    public function __construct(ChanelBase $chanelBase, TelegramMethods $methods)
    {
        $this->chanel = $chanelBase;
        $this->methods = $methods;

    }

    public function ChanelAdd($request){


        $this->token   = $request['description'];
        $this->address = $request['token'];

        //проверка канала
        $valid_chanel_check = $this->chanel->curl($this->methods->getMe.$this->address);
        $valid_chanel_check = strpos($valid_chanel_check ,'members');


        if($valid_chanel_check !== false){

            //проверка токена
            $check_token = $this->chanel
                ->curl($this->methods->botApi. $this->token. $this->methods->getMe);

            $pos = strpos($check_token, 'first_name');

            if ($pos !== false) {

                //получаем имя канала
                $get_channel_name =$this->chanel
                    ->curl($this->methods->botApi. $this->token. $this->methods->getChat. $this->address);

                $get_channel_name = json_decode($get_channel_name, true);
                $channel_name = $get_channel_name['result']['title'];


                //проверяем является ли бот администратором
                $check_admin_bot = $this->chanel
                    ->curl($this->methods->botApi. $this->token .$this->methods->get_admin. $this->address);

                $check_admin_bot = $this->chanel
                    ->check_admin_bot($check_admin_bot);


                if($check_admin_bot !== false){
                    //сохраняемый пакет
                    $post = [
                        'name'        => $channel_name,
                        'description' => $this->address,
                        'token'       => $this->token
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
                return $save = 'нет канала';
            }

        };


    }

    public function TokenEdit(TelegramRequest $request){

        $this->token   = $request['description'];
        $this->address = $request['token'];


        //проверяем является ли бот администратором
        $check_admin_bot = $this->chanel
            ->curl($this->methods->botApi. $this->token .$this->methods->get_admin. $this->address);

        if ($check_admin_bot !== false) {
            //сохраняемый пакет
            $post = [
                'token' => $this->token
            ];
            $channel = new Channel();
            $channel->saveChanel($post);

            if ($channel->update()) {

                return redirect('channels')->with('status', 'Токен обновлен');
            }


        } else {
            return redirect('channels')->with('status', 'Телеграм бот не имеет достаточно прав');
        }

    }

}