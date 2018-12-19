@extends('adminlte::page')

@section('content')
	<div class="box-body">
		<table class="table table-striped table-hover" id="myTable">
			<thead>
	            <tr>
	                <th>Id</th>
	                <th>Name</th>
	                <th>Email</th>
	                <th>Created At</th>
	                <th>Updated At</th>
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
	            { data: 'updated_at', name: 'updated_at' }
	        ]
	    });
	});
    </script>
@endsection