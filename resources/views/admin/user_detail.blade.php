@extends('adminlte::page')

@section('content')

<div class="col-md-3">
	<div class="box box-primary">
		<div class="box-body box-profile">
			<img class="profile-user-img img-responsive img-circle" src="{{ asset('img/page.jpg') }}" alt="User picture">
			<h3 class="profile-username text-center">{{ $user->name }}</h3>
			<ul class="list-group list-group-unbordered">
				<li class="list-group-item">
					<b>Email</b>
					<a class="pull-right">{{ $user->email }}</a>
				</li>
				<li class="list-group-item">
					<b>Создан</b>
					<a class="pull-right">{{ $user->created_at }}</a>
				</li>
				<li class="list-group-item">
					<b>Обновлен</b>
					<a class="pull-right">{{ $user->updated_at }}</a>
				</li>
			</ul>
			<a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-block">
				<b>Редактировать</b>
			</a>
		</div>
		<div class="box-footer text-center">
			<a href="{{ url('/users') }}" class="pad_a">Назад</a>
		</div>
	</div>
</div>

@endsection