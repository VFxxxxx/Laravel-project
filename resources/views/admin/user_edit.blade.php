@extends('adminlte::page')

@section('content')
<div class="box box-primary">
<div class="box-header with-border">
	<h3 class="box-title">
		Редактировать пользователя: {{ $user->name }}
	</h3>
<form method="post" action="{{ action('UserController@update', $user) }}" accept-charset="UTF-8">
	@method('patch')
	<div class="box-body">
		<div class="form-group">
		<label>ФИО</label>
		<input name="name" type="text" class="form-control" placeholder="ФИО" value="{{ $user->name }}">
		</div>
		<div class="form-group">
		<label>Адрес электронной почты</label>
		<input name="email" type="email" class="form-control" placeholder="Адрес электронной почты" value="{{ $user->email }}">
		</div>
		<div class="form-group">
		<label>Старый пароль</label>
		<input name="old_password" type="password" class="form-control" placeholder="старый пароль">
		</div>
		<div class="form-group">
		<label>Новый пароль</label>
		<input name="password" type="password" class="form-control" placeholder="новый пароль">
		</div>
		<div class="form-group">
		<label>Подтвердите новый пароль</label>
		<input name="password_confirm" type="password" class="form-control" placeholder="новый пароль">
		</div>
	</div>
	<div class="box-footer">
		<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
		<input type="submit" value="Обновить" class="btn btn-primary">
	</div>
</form>
</div>
	<div class="box-footer text-center">
		<a href="{{ route('users.index') }}" class="pad_a">Назад</a>
	</div>
</div>

@include('errors.errors')

@endsection