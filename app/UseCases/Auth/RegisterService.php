<?php

namespace app\UseCases\Auth;

use App\User;
use App\Http\Requests\RegisterRequest;
use App\Mail\VerifyMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Mail\Mailer;

class RegisterService
{
    private $mailer;
    private $dispatcher;

    public function __construct(Mailer $mailer, Dispatcher $dispatcher)
    {
        $this->mailer = $mailer;
        $this->dispatcher = $dispatcher;
    }

    public function register(RegisterRequest $request)
    {
        $user = User::register(
            $request['name'],
            $request['email'],
            $request['password']
        );


        $this->mailer->to($user->email)->queue(new VerifyMail($user));
        $this->dispatcher->dispatch(new Registered($user));
    }

    public function verify($id)
    {

        $user = User::findOrFail($id);
        $user->verify();
    }
}
