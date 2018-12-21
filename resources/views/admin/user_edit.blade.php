@extends('adminlte::page')

@section('content')
<div class="box box-primary">
<div class="box-header with-border">
	<h3 class="box-title">
		Edit user: {{ $user->name }}
	</h3>
<form method="post" action="{{ action('UserController@update', $user) }}" accept-charset="UTF-8">
	@method('patch')
	<div class="box-body">
		<div class="form-group">
		<label>Name</label>
		<input name="name" type="text" class="form-control" placeholder="Enter email" value="{{ $user->name }}">
		</div>
		<div class="form-group">
		<label>Email address</label>
		<input name="email" type="email" class="form-control" placeholder="Enter email" value="{{ $user->email }}">
		</div>
		<div class="form-group">
		<label>Old password</label>
		<input name="old_password" type="password" class="form-control" placeholder="Password">
		</div>
		<div class="form-group">
		<label>New password</label>
		<input name="password" type="password" class="form-control" placeholder="Password">
		</div>
		<div class="form-group">
		<label>Confirm new password</label>
		<input name="password_confirm" type="password" class="form-control" placeholder="Password">
		</div>
	</div>
	<div class="box-footer">
		<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
		<input type="submit" value="Update" class="btn btn-primary">
	</div>
</form>
</div>
	<div class="box-footer text-center">
		<a href="{{ url('/users') }}" class="pad_a">Back</a>
	</div>
</div>

@if ($errors->any())
	<ul class="alert alert-danger pm">
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif

@endsection