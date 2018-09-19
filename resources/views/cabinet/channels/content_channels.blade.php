<div class="px-content">
<div class="row">
    <div class="col-md-8">

    @if($channels)

        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№</th>
                <th>Имя</th>
                <th>Адрес канала</th>
                <th>Дата добавления</th>
                <th>Удалить</th>
                <th>Редактировать</th>
            </tr>
            </thead>
            <tbody>

            @foreach($channels as $k => $channel)

                <tr>

                    <td>{{ $channel->id }}</td>
                    <td>{{ $channel->name }}</td>
                    <td>{{ $channel->description }}</td>
                    <td>{{ $channel->created_at }}</td>
                    <td>
                        {!! Form::open(['url'=>route('channelEdit',['channel'=>$channel->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}

                        {{ method_field('DELETE') }}
                        {!! Form::button('Удалить',['class'=>'btn btn-danger','type'=>'submit']) !!}

                        {!! Form::close() !!}
                    </td>
                    <td>
                        <p><a href="{!!route('channelEdit',['channel'=>$channel->id])!!}" class="btn btn-primary">Редактировать</a></p>

                    <td>

                </tr>

            @endforeach


            </tbody>
        </table>
    @endif


     <p><a href="{!!route('channelAdd')!!}" class="btn btn-info">Добавить канал</a></p>

</div>
</div></div>