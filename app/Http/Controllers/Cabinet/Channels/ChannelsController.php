<?php

namespace App\Http\Controllers\Cabinet\Channels;

use App\Entity\Cabinet\Channels\Channel;
use App\Http\Requests\TelegramRequest;
use App\UseCases\Chanel\TelegramService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChannelsController extends Controller
{
    public $service;

    public function __construct (TelegramService $service){

        $this->service = $service;

    }
    //выводим все каналы
    public function show(){

        if(view()->exists('cabinet.channels.channels')){

            $channels = Channel::all();

            $data = [
                'title'=>'Каналы',
                'channels'=>$channels
            ];

            return view('cabinet.channels.channels',$data);
        }

        abort(404);
    }


    //get
    public function chanelAddform()
    {
        return view('cabinet.channels.channels_add');
    }

    //post
    public function chanelAdd(TelegramRequest $request)
    {
        $request->except('_token');

        $channelChanged = Channel::where('description',$request->description)->first();

        //если были изменения
        if(!$channelChanged){

            $ChanelAdd = $this->service->ChanelAdd($request);

            switch ($ChanelAdd){
                case 'Сохранен';
                    return redirect()->route('channel')
                        ->with('status', 'Канал добавлен');
                    break;

                case 'нет прав';
                    return redirect()->route('channelAdds')
                        ->with('status', 'Телеграм бот не имеет достаточно прав');
                    break;

                case 'нет канала';
                    return redirect()->route('channelAdds');
                    break;

                case 'неправильный токен';
                    return redirect()->route('channelAdds');
                    break;

            }
        }else{
            return redirect()->route('channelAdds')->with('status', 'Такой канал уже есть');
        }

    }

    public function edit(Channel $channel,TelegramRequest $request)
    {


        if ($request->isMethod('delete')) {

            $channel->delete();
            return redirect('channels')->with('status', 'Канал удален');
        }



        if ($request->isMethod('post')) {
            $input = $request->except('_token');

            $tokenChanged   = Channel::where('token',$request->token)->first();


            //если были изменения
            if(!$tokenChanged){



            $channel_js = json_decode($channel,true);

            //проверка токена
            $tokenEdit = $this->service->TokenEdit($request);



                switch ($tokenEdit) {

                    case 'Токен обновлен';
                        return redirect()->route('channel')
                            ->with('status', 'Токен обновлен');
                        break;

                    case 'нет прав';
                        return redirect()->route('channelEdit')
                            ->with('status', 'Телеграм бот не имеет достаточно прав');
                        break;
                }
        }
        }


        if(view()->exists('cabinet.channels.channels_edit')){

            $data = [
                'title'=>'Редактирование токена',
                'channel'=>$channel
            ];

            return view('cabinet.channels.channels_edit',$data);

        }

        abort(404);
    }

}
