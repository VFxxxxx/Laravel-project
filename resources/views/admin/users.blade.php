@extends('adminlte::page')

@section('content')
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<div class="box box-primary">
		<div class="box-body">
			<a href="users/create" type="button" class="btn btn-success mb"><span class="glyphicon glyphicon-pencil"></span> Создать пользователя</a>
			<table class="table table-bordered table-striped dataTable" id="myTable">
				<thead>
		            <tr>
		                <th>id</th>
		                <th>ФИО</th>
		                <th>Email</th>
		                <th>Создан</th>
		                <th>Обновлен</th>
		                <th>Редактировать / Удалить</th>
		            </tr>
		        </thead>
		    </table>
		</div>
	</div> 
@endsection

@section('js')
	<script>
		//создание Datatable
		var tableDT = $('#myTable').DataTable({
			"language": 
			{
			  "processing": "Подождите...",
			  "search": "Поиск:",
			  "lengthMenu": "Показать _MENU_ записей",
			  "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
			  "infoEmpty": "Записи с 0 до 0 из 0 записей",
			  "infoFiltered": "(отфильтровано из _MAX_ записей)",
			  "infoPostFix": "",
			  "loadingRecords": "Загрузка записей...",
			  "zeroRecords": "Записи отсутствуют.",
			  "emptyTable": "В таблице отсутствуют данные",
			  "paginate": {
			    "first": "Первая",
			    "previous": "Предыдущая",
			    "next": "Следующая",
			    "last": "Последняя"
			  },
			  "aria": {
			    "sortAscending": ": активировать для сортировки столбца по возрастанию",
			    "sortDescending": ": активировать для сортировки столбца по убыванию"
			  }
			},
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
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
@endsection