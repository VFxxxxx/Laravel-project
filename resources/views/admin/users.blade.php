@extends('adminlte::page')

@section('content')
	<div class="box-body">
			<a href="users/create" type="button" class="btn btn-success mb">Create user</a>

		<table class="table table-striped table-hover" id="myTable">
			<thead>
	            <tr>
	                <th>Id</th>
	                <th>Name</th>
	                <th>Email</th>
	                <th>Created At</th>
	                <th>Updated At</th>
	                <th>Edit / Delete</th>
	            </tr>
	        </thead>
	    </table>
	</div> 
@endsection

@section('js')
    <script>
    	$(function() {
	    $('#myTable').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax: '{!! route('getusers') !!}',
	        columns: [
	            { data: 'id', name: 'id' },
	            { data: 'name', name: 'name' },
	            { data: 'email', name: 'email' },
	            { data: 'created_at', name: 'created_at' },
	            { data: 'updated_at', name: 'updated_at' },
	            { data: 'intro', name: 'intro' }
	        ]
	    });
	});
    </script>
@endsection