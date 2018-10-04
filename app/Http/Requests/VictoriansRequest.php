<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VictoriansRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => ['max:255','unique:victorians'],
        ];
    }

    public function messages()
    {
        return $messages =[
            'required'=>'Поле обязательно к заполнению!',
            'unique'  =>'Викторина с таким именем уже сущестует!',
            'max:255' => 'Не больше 255 символов'

        ];
    }
}
