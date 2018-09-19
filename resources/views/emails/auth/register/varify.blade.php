@component('mail::message')

# Email подтверждение

    Пожалуйста, пройдите по ссылке ниже и выполните авторизацию;

@component('mail::button',['url'=> route('register.verify',['token'
=> $user ->verify_token ])])
    Verify Email
@endcomponent

     Спасибо ,
    {{config('app.name')}}

@endcomponent