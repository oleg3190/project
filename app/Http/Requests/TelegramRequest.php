<?php

namespace App\Http\Requests;

use App\Entity\Cabinet\Channels\Channel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class TelegramRequest extends FormRequest
{
    public function authorize()
    {/*
        $Channel = Channel::find($this->route('channel'));
        $user_id =
        if ()
       */
        return true;
    }

    public function rules()
    {
        return [
            'token' => ['max:255','token'],
            'description' => ['max:255','unique:channels','description'],
        ];
    }
    public function messages()
    {
        return $messages =[
            'required'=>'Поле обязательно к заполнению',
            'unique'  =>'Поле должно быть уникальным',
            'token'   =>'В имени токена имеются пробелы',
            'description'  =>'Неправильно указан адрес канала! Адресс должен содержать только буквы ',
        ];
    }
}
