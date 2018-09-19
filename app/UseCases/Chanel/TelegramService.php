<?php

namespace app\UseCases\Chanel;
use App\Entity\Cabinet\Channels\Channel;
use App\Http\Requests\TelegramRequest;
use app\UseCases\Chanel\TelegramBase as ChanelBase;

class TelegramService
{
    public $token;
    public $address;
    public $chanel;

    public function __construct(ChanelBase $chanelBase)
    {
        $this->chanel = $chanelBase;

    }

    public function ChanelAdd($request){


        $this->token   = $request['description'];
        $this->address = $request['token'];

        //проверка канала
        $valid_chanel_check = $this->chanel->curl($this->chanel->getMe.$this->address);
        $valid_chanel_check = strpos($valid_chanel_check ,'members');


        if($valid_chanel_check !== false){

            //проверка токена
            $check_token = $this->chanel
                ->curl($this->chanel->botApi. $this->token. $this->chanel->getMe);

            $pos = strpos($check_token, 'first_name');

            if ($pos !== false) {

                //получаем имя канала
                $get_channel_name =$this->chanel
                    ->curl($this->chanel->botApi. $this->token. $this->chanel->getChat. $this->address);

                $get_channel_name = json_decode($get_channel_name, true);
                $channel_name = $get_channel_name['result']['title'];


                //проверяем является ли бот администратором
                $check_admin_bot = $this->chanel
                    ->curl($this->chanel->botApi. $this->token .$this->chanel->get_admin. $this->address);


                $check_admin_bot = $this->chanel
                    ->check_admin_bot($this->token,$this->address);


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
            ->curl($this->chanel->botApi. $this->token .$this->chanel->get_admin. $this->address);

        if ($check_admin_bot !== false) {
            //сохраняемый пакет
            $post = [
                'token' => $this->token
            ];
            $channel = new Channel();
            $channel->fill($post);

            if ($channel->update()) {
                dd($channel);
                return redirect('channels')->with('status', 'Токен обновлен');
            }


        } else {
            return redirect('channels')->with('status', 'Телеграм бот не имеет достаточно прав');
        }

    }

}