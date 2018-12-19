@extends('adminlte::page')

@section('content')
	<div class="box-body">
		<table class="table table-striped table-hover" id="siswa-table">
			<thead>
				<th>Title</th>
				<th>Body</th>
			</thead>
			<tbody>
				<tr>
					<td>{{ $article->title }}</td>
					<td>{{ $article->body }}</td>
				</tr>
			</tbody>
		</table>
		<a href="/articles">Back</a>
	</div> 
@endsection