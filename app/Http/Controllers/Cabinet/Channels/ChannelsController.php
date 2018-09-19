<?php

namespace App\Http\Controllers\Cabinet\Channels;

use App\Entity\Cabinet\Channels\Channel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChannelsController extends Controller
{
    //выводим все каналы
    public function execute(){

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

}
