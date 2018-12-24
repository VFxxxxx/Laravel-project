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
        };

    //отправка ajax запроса
    $.ajax(
    {
        url: "users/"+id,
        type: 'delete',
        dataType: "JSON",
        data: {
        },
        //чтобы не сихнронно работал с сервером , а по порядку выполнял действия
        sync: false,
        success: sucF(),
        error: function(xhr) {
         console.log(xhr.responseText);
       }
    });
}

// add datatablestales
$('#myTable_wrapper .dataTables_length').addClass('col-sm-6');
$('#myTable_wrapper .dataTables_length select').addClass('form-control input-sm');
$('#myTable_wrapper .dataTables_filter').addClass('col-sm-6');
$('#myTable_wrapper .dataTables_filter input').addClass('form-control input-sm');
$('#myTable_wrapper .sorting').addClass('tac');
$('.table').addClass('tac');