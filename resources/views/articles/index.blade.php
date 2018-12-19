@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="full-right">
				<h2>Articles</h2>
			</div>
		</div>
	</div>

	<table class="table table-bordered">
		<tr>
			<th width="80px"></th>
			<th>Title</th>
			<th>Body</th>
			<th class="text-center" width="140px">
				<a href="{{route('articles.create')}}" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus">add article</i></a>
			</th>
		</tr>
	<?php $no = 1; ?>
	@foreach ($article as $key => $value)
		<tr>
			<td>{{ $no++ }}</td>
			<td>{{ $value->title }}</td>
			<td>{{ $value->body }}</td>
			<td>
				<a href="{{route('articles.show',$value->id)}}" class="btn btn-info btn-sm">
					<i class="glyphicon glyphicon-th-large">info</i>
				</a>
				<a href="{{route('articles.edit',$value->id)}}" class="btn btn-primary btn-sm">
					<i class="glyphicon glyphicon-pencil">edit</i>
				</a>
				
			</td>
		</tr>
	@endforeach
	</table>
@endsection