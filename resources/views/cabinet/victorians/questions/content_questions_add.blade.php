
<div class="px-content">
	<div class="row">
		<div class="col-md-8">

<div class="wrapper container-fluid">

	<script src="{!! asset('/js/questions.button.js') !!}"></script>

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
		
		{!! Form::label('name','Назавание вопроса',['class' => 'col-xs-2 control-label'])   !!}

		<div class="col-xs-8">
			{!! Form::text('name',old('name'),['class' => 'form-control','placeholder'=>'Введите название','required'])!!}
		</div>
	
	</div>

	<div class="form-group">

		{!! Form::label('name','Картинка',['class' => 'col-xs-2 control-label'])   !!}

		<div class="col-xs-8">
			{!! Form::file('image',['id'=>'image']) !!}
		</div>

	</div>

		<div class="form-group">

			{!! Form::label('name','Описание',['class' => 'col-xs-2 control-label'])   !!}

			<div class="col-xs-8">

				{!! Form::textarea('descriptions',old('name'),['class' => 'form-control','id'=>'textArea','placeholder'=>'Максимальное колличество символов при использовании изображения 200!','onkeypress'=>'return isNotMax(this)','required'])!!}

				<div class="counter">Осталось символов: <span id="counter"></span></div>

			</div>
		</div>


	<div class="form-group">

		{!! Form::label('name','Кнопки',['class' => 'col-xs-2 control-label'])   !!}

		<div class="col-xs-8" id="buttons">
			{!! Form::text('button',old('name'),['class' => 'form-control','placeholder'=>'Имя кнопки'])!!}
		</div>

		<button id="button">Добавить</button>

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