<?php

namespace App\Http\Controllers\Cabinet\Victorians;
use App\Entity\Cabinet\Channels\Channel;
use App\Entity\Cabinet\Victorians\Victorians;
use App\Http\Requests\VictoriansRequest;
use App\UseCases\Victorians\VictoriansService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VictoriansController extends Controller
{
    public $service;

    public function __construct(VictoriansService $service)
    {
        $this->service = $service;
    }


    public function create(VictoriansRequest $request)
    {
        if($request->isMethod('post')){
            $request->except('_token');

            $victorians = $this->service->create($request);
            if($victorians){
                return redirect()->route('victorians')
                    ->with('success', 'Викторина успешно добавлена!');
            }else{
                return redirect()->route('victoriansAdd')
                    ->with('danger', 'Ошибка!Попробуйте еще раз');
            }
        }


        if(view()->exists('cabinet.victorians.victorians_add')){

            $channels = Channel::where('user_id',Auth::user()->id)->get();
            $data = [
                'title'=>'Викторина',
                'channels'=>$channels
            ];

            return view('cabinet.victorians.victorians_add',$data);

        }


    }

    public function show(){

        if(view()->exists('cabinet.victorians.victorians')){

            $victorians = Victorians::where('user_id',Auth::user()->id)->get();
            $data = [
                'title'=>'Викторины',
                'victorians'=>$victorians
            ];

            return view('cabinet.victorians.victorians',$data);

        }

    }

    public function destroy(Request $request,Victorians $victorians){

        if ($request->isMethod('delete')) {

            $victorians->delete();
            return redirect('victorians')->with('success', 'Викторина успешно удалена!');
        }
    }

}
