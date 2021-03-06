<?php

namespace App\UseCases\Chanel;

use App\Entity\Cabinet\Channels\Channel;
use App\UseCases\Interfaces\ChanelBase;

class TelegramBase implements ChanelBase
{
    private $chanel;

    public function __construct()
    {
        $this->chanel = new Channel();
    }

    public function curl($url)
    {

        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.9.2.12) Gecko/20101026 Firefox/3.6.12');
        $check_url = curl_exec($curl_handle);
        curl_close($curl_handle);

        return $check_url;

    }

    public function check_admin_bot($url)
    {

        $check_rights = json_decode($url, true);
        if ($check_rights['result']['0']['status'] === 'administrator' ||
            $check_rights['result']['0']['can_post_messages'] === 'true'
        ) {
            return $check_rights = '1';
        } else {

            return $check_rights = '0';
        }

    }

    public function save($chanel){

        $this->chanel->fill($chanel);
        if($this->chanel->save()){
            return true;
        }else{
            return false;
        }
    }

    public function update($chanel){
        $this->chanel->fill($chanel);
        if($this->chanel->update()){
            return true;
        }else{
            return false;
        }
    }

}
