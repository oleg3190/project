<?php

namespace App\Http\Controllers\Cabinet\Channels;

use App\Entity\Cabinet\Channels\Channel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ChannelsEditController extends Controller
{
    public function execute(Channel $channel, Request $request)
    {



        if ($request->isMethod('delete')) {


            $channel->delete();
            return redirect('channels')->with('status', 'Канал удален');
        }



        if ($request->isMethod('post')) {
            $input = $request->except('_token');



            $channel_js = json_decode($channel,true);

            //проверка токена

            $check_token = Channel::check_token($input['token']);


            if ($check_token !== false) {

                //проверяем является ли бот администратором
                $check_admin_bot = Channel::check_admin_bot($input['token'], $channel_js['description']);



                if ($check_admin_bot !== false) {

                    $tk = $input['token'];

                    //сохраняемый пакет
                    $post = [
                        'token' => $tk
                    ];

                    $channel->fill($post);
                    //dd($channel);

                    if ($channel->update()) {
                        dd($channel);
                        return redirect('channels')->with('status', 'Токен обновлен');
                    }


                } else {
                    return redirect('channels')->with('status', 'Телеграм бот не имеет достаточно прав');
                }

            }
            // $page = Page::find(id);
            //$old = $channel->toArray();

        }


        if(view()->exists('cabinet.channels.channels_edit')){

            $data = [
                'title'=>'Редактирование токена'
            ];

            return view('cabinet.channels.channels_edit',$data);

        }

        abort(404);
    }


}


