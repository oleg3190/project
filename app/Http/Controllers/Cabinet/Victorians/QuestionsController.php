<?php

namespace App\Http\Controllers\Cabinet\Victorians;

use App\Entity\Cabinet\Victorians\Question;
use App\Entity\Cabinet\Victorians\Victorians;
use App\UseCases\Questions\QuestionsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class QuestionsController extends Controller
{
    public $service;

    public function __construct(QuestionsService $service)
    {
        $this->service = $service;
    }


    public function create(Request $request)
    {

        dd($request);

        if($request->isMethod('post')){
            $request->except('_token');

            $questions = $this->service->create($request);
            if($questions){
                return redirect()->route('questions')
                    ->with('success', 'Вопрос успешно добавлен!');
            }else{
                return redirect()->route('questionsAdd')
                    ->with('danger', 'Ошибка!Попробуйте еще раз');
            }
        }


        if(view()->exists('cabinet.victorians.questions.questions_add')){

            $victorians = Victorians::where('user_id',1)->get();
            $data = [
                'title'=>'Вопросы',
                'channels'=>$victorians
            ];

            return view('cabinet.victorians.questions.questions_add',$data);

        }


    }

    public function show(Request $request){



        if(view()->exists('cabinet.victorians.questions.questions')){

            $questions = Question::where('victorians_id',$request->victorians)->get();

            $data = [
                'title'=>'Вопросы',
                'questions'=>$questions
            ];

            return view('cabinet.victorians.questions.questions',$data);

        }

    }

    public function destroy(Request $request,Question $questions){

        if ($request->isMethod('delete')) {

            $questions->delete();
            return redirect('questions')->with('success', 'Вопрос успешно удален!');
        }
    }
}
