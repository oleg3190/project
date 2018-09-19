<?php

namespace App\Http\Controllers\Cabinet\Channels;

use App\Entity\Cabinet\Channels\Channel;
use App\Http\Controllers\Controller;
use app\UseCases\Chanel\TelegramService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

use App\Http\Requests\TelegramRequest;


class ChannelsAddController extends Controller
{


    public $service;

    public function __construct (TelegramService $service){

        $this->service = $service;

    }

    //get
    public function chanelAdd()
    {
        return view('cabinet.channels.channels_add');
    }


    //post
    //проверяем введенную информацию и если верно сохраняем
    public function execute(TelegramRequest $request)
    {
        $request->except('_token');

        $ChanelAdd = $this->service->ChanelAdd($request);



        if($ChanelAdd == 'Сохранен' ) {

          return  redirect('channels')
                ->with('status', 'Канал добавлен');


        }else if($ChanelAdd == 'нет прав'){

          return redirect('channels')
                    ->with('status', 'Телеграм бот не имеет достаточно прав');


        }else if($ChanelAdd == 'нет канала'){

          return redirect('channels')
                    ->with('status', 'Такого телеграм канала не обнаружено');
        }
        }

    }
