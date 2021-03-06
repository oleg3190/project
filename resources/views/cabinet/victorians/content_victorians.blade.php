<div class="px-content">
<div class="row">
    <div class="col-md-8">

            @include('cabinet.events')
            @yield('content')


    @if($victorians)

        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Канал</th>
                <th>Время запуска</th>
                <th>Время завершения</th>
                <th>Дата добавления</th>
            </tr>
            </thead>
            <tbody>

            @if(isset($victorians))
            @foreach($victorians as $k => $victorian)

                <tr>
                    <td>{{ $victorian->name }}</td>
                    <td>{{ $victorian->chanel }}</td>
                    <td>{{ $victorian->timeStart }}</td>
                    <td>{{ $victorian->timeStop }}</td>
                    <td>{{ $victorian->created_at }}</td>

                    <td><a href="{!!route('questions',['victorians'=>$victorian->id])!!}" class="btn btn-info">Вопросы</a></td>

                    <td><a href="{!!route('questionsAdd',['victorians'=>$victorian->id])!!}" class="btn btn-info">Добавить вопрос</a></td>
                    <td>
                        {!! Form::open(['url'=>route('victoriansDestroy',['victorians'=>$victorian->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}

                        {{ method_field('DELETE') }}
                        {!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}

                        {!! Form::close() !!}
                    </td>

                </tr>
            @endforeach
           @endif

            </tbody>
        </table>
    @endif

     <p><a href="{!!route('victoriansAdd')!!}" class="btn btn-info">Добавить викторину</a></p>

</div>
</div></div>