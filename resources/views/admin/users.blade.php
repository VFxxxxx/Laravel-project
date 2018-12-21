@extends('adminlte::page')

@section('content')
	<div class="box-body">
			<a href="users/create" type="button" class="btn btn-success mb">Create user</a>
	<meta name="csrf-token" content="{{ csrf_token() }}">
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
    		//создание Datatable
		    var tableDT = $('#myTable').DataTable({
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

		    function destroyElement(selector){
		    	var id = $(selector).val();
		    	$.ajaxSetup({
			        headers: {
			            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }
			    });

		    	var sucF = function (response)
			        {
			        	//перерисовка таблицы
						tableDT.draw();
			            console.log(response);
			        };

			    //отправка ajax запроса
			    $.ajax(
			    {
			        url: "users/"+id,
			        type: 'delete',
			        dataType: "JSON",
			        data: {
			            "id": id 
			        },
			        //чтобы не сихнронно работал с сервером , а по порядку выполнял действия
			        sync: false,
			        success: sucF(),
			        error: function(xhr) {
			         console.log(xhr.responseText);
			       }
			    });
		    }
    </script>
@endsection