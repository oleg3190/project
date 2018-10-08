<div class="px-content">
<div class="row">
    <div class="col-md-8">

            @include('cabinet.events')
            @yield('content')

    @if($questions)

        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Описание</th>
                <th>Картинка</th>
                <th>Дата добавления</th>

            </tr>
            </thead>
            <tbody>

            @foreach($questions as $k => $question)

                <tr>
                    <td>{{ $question->name }}</td>
                    <td>{{ $question->text }}</td>
                    <td>{{ $question->img }}</td>
                    <td>{{ $question->created_at }}</td>
                    <td>
                        {!! Form::open(['url'=>route('questionsDestroy',['question'=>$question->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}
                        {{ method_field('DELETE') }}
                        {!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </td>

                </tr>

            @endforeach


            </tbody>
        </table>
    @endif

     <p><a href="{!!route('victorians')!!}" class="btn btn-info">Назад</a></p>

</div>
</div></div>