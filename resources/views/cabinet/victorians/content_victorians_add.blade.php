
<div class="px-content">
	<div class="row">
		<div class="col-md-8">

<div class="wrapper container-fluid">

	@if(count($errors)>0)

		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
			</ul>
		</div>
		@endif

		@include('cabinet.events')
		@yield('content')

	{!! Form::open(['url' => route('victoriansAdd'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}
		{{csrf_field()}}


	<div class="form-group">
		
		{!! Form::label('name','Назавание викторины',['class' => 'col-xs-2 control-label'])   !!}

		<div class="col-xs-8">
			{!! Form::text('name',old('name'),['class' => 'form-control','placeholder'=>'Введите название','required'])!!}
		</div>
	
	</div>

		<div class="form-group">

			{!! Form::label('chanel','Выбор канала для викторины',['class' => 'col-xs-2 control-label','required'])   !!}

			@if(count($channels) > 0)

				@foreach($channels  as $k => $channel )

					{{$channel->name}}
					{!! Form::radio('chanel', $channel->name,true) !!}

					@endforeach

				@endif


		</div>


	<div class="form-group">
	     {!! Form::label('timeStart', 'Время начала',['class'=>'col-xs-2 control-label']) !!}
	     <div class="col-xs-8">
		 	{!! Form::date('timeStart', \Carbon\Carbon::now()) !!}
		 </div>
    </div>

		<div class="form-group">
			{!! Form::label('timeInterval', 'Интервал между вопросами',['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
				{!! Form::text('timeInterval', '60', ['class' => 'form-control','placeholder'=>'Значение указывайте в секундах','value'=>'60','required']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('timeStop', 'Время завершения',['class'=>'col-xs-2 control-label']) !!}
			<div class="col-xs-8">
				{!! Form::date('timeStop', \Carbon\Carbon::now()) !!}
			</div>
		</div>

      <div class="form-group">
	    <div class="col-xs-offset-2 col-xs-10">
	      {!! Form::button('Сохранить', ['class' => 'btn btn-primary','type'=>'submit']) !!}
	    </div>
	  </div>

	{!! Form::close() !!}
	


</div>
		</div>
	</div>
</div>