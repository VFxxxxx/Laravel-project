@extends('adminlte::page')

@section('content')
<div class="box box-primary">
<div class="box-header with-border">
	<h3 class="box-title">
		Создать нового пользователя
	</h3>
	<form method="post" action="{{ action('UserController@store') }}" accept-charset="UTF-8">
	<div class="box-body">
		<div class="form-group">
		<label>ФИО</label>
		<input name="name" type="text" class="form-control" placeholder="Введите ФИО" value="{{ @old('name') }}">
		</div>
		<div class="form-group">
		<label>Адрес электронной почты</label>
		<input name="email" type="email" class="form-control" placeholder="Введите email" value="{{ @old('email') }}">
		</div>
		<div class="form-group">
		<label>Пароль</label>
		<input name="password" type="password" class="form-control" placeholder="пароль">
		</div>
		<div class="form-group">
		<label>Повторите пароль</label>
		<input name="password_confirm" type="password" class="form-control" placeholder="пароль">
		</div>
	</div>
	<div class="box-footer">
		<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
		<input type="submit" value="Добавить" class="btn btn-primary">
	</div>
	</form>
</div>
	<div class="box-footer text-center">
		<a href="{{ url('/users') }}" class="pad_a">Назад</a>
	</div>
</div>

@include('errors.errors')

@endsection