
<div class="px-content">
	<div class="row">
		<div class="col-md-8">

			@include('cabinet.events')
			@yield('content')


<div class="wrapper container-fluid">

	{!! Form::open(['url' => route('channelEdit',['channel'=> $channel['id']]),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}


	<div class="form-group">
		
		{!! Form::label('token','Новый токен для вашего бота',['class' => 'col-xs-2 control-label'])   !!}

		<div class="col-xs-8">
			{!! Form::text('token',old('token'),['class' => 'form-control','placeholder'=>'Введите новый токен','required'])!!}
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