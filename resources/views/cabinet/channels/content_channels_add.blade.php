
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

	{!! Form::open(['url' => route('channelAdd'),'class'=>'form-horizontal','method'=>'POST','enctype'=>'multipart/form-data']) !!}


	<div class="form-group">
		
		{!! Form::label('token','Токен вашего бота',['class' => 'col-xs-2 control-label'])   !!}

		<div class="col-xs-8">
			{!! Form::text('token',old('token'),['class' => 'form-control','placeholder'=>'Введите токен','required'])!!}
		</div>
	
	</div>

	<div class="form-group">
	     {!! Form::label('description', 'Адрес вашего канала:',['class'=>'col-xs-2 control-label']) !!}
	     <div class="col-xs-8">
		 	{!! Form::text('description', '', ['class' => 'form-control','placeholder'=>'Введите адрес','required']) !!}
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