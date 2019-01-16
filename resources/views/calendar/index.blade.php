@extends('adminlte::page')
@section('css')
<link rel='stylesheet' href="{{ asset('css/fullcalendar.min.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/smoothness/jquery-ui.css">
@endsection

@section('content')
<div class="row">
	<div class="col-md-9">
		<div class="box box-primary">
			<div class="box-body no-padding">
				<div id='calendar' class="fc fc-unthemed fc-ltr"></div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<button class="btn btn-success add-event-button" data-toggle="modal" data-target="#modal-success">Добавить событие</button>
	</div>
</div>

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal modal-default fade in" id="modal-success">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Добавить событие</h4>
      </div>
      <form id="form-create-event">
	      <div class="modal-body">
	      	<div class="box-body" ><!--id="dialog-form"-->
		      		<div class="form-group">
		              <label for="event_type">Тип события</label>
		              <input type="text" class="form-control" id="event_type" placeholder="тип события" required>
		            </div>
		      		<div class="form-group">
		              <label for="event_start">Начало</label>
		              <input type="text" class="form-control" id="event_start" placeholder="начало" required>
		            </div>
		      		<div class="form-group">
		              <label for="event_end">Конец</label>
		              <input type="text" class="form-control" id="event_end" placeholder="конец" required>
		            </div>
		            <input type="hidden" name="event_id" id="event_id" value="">
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Отмена</button>
	        <input type="submit" class="btn btn-primary submit-event" value="Добавить">
	      </div>
      </form>
    </div>
  </div>
</div>

<div style="display: none;">
	<button class="btn btn-success edit-event-button" data-toggle="modal" data-target="#modal2" ">Редактировать событие</button>	
</div>

<div class="modal modal-default fade in" id="modal2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Редактировать событие</h4>
      </div>
      <form id="form-create-event">
	      <div class="modal-body">
	      	<div class="box-body" ><!--id="dialog-form"-->
		      		<div class="form-group">
		              <label for="event_type">Тип события</label>
		              <input type="text" class="form-control" id="event_type" placeholder="тип события" required>
		            </div>
		      		<div class="form-group">
		              <label for="event_start">Начало</label>
		              <input type="text" class="form-control" id="event_start" placeholder="начало" required>
		            </div>
		      		<div class="form-group">
		              <label for="event_end">Конец</label>
		              <input type="text" class="form-control" id="event_end" placeholder="конец" required>
		            </div>
		            <input type="hidden" name="event_id" id="event_id" value="">
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Отмена</button>
	        <input type="submit" class="btn btn-primary submit-event" value="Добавить">
	      </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('js')
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('js/moment.js') }}"></script>
<script src="{{ asset('js/fullcalendar.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/i18n/jquery-ui-timepicker-ru.js"></script>-->

<script type="text/javascript">
// page is now ready, initialize the calendar...
var format = "MM/dd/yyyy HH:mm";
$('#calendar').fullCalendar({
	monthNames: ['Январь','Февраль','Март','Апрель','Май','οюнь','οюль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
    monthNamesShort: ['Янв.','Фев.','Март','Апр.','Май','Июнь','Июль','Авг.','Сент.','Окт.','Ноя.','Дек.'],
    dayNames: ["Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота"],
    dayNamesShort: ["ВС","ПН","ВТ","СР","ЧТ","ПТ","СБ"],
    buttonText: {
        today: "Сегодня",
        month: "Месяц",
        week: "Неделя",
        day: "День"
    },
	dayClick: function(date, allDay, jsEvent, view) {
	    var newDate = date.format();
	    $("#event_start").val(newDate);
	    $("#event_end").val(newDate);
	    $('.add-event-button').click();
	},
	header: {
	left: 'prev,next today',
	center: 'title',
	right: 'month,agendaWeek,agendaDay'
	},

	eventClick: function(event, element) {
		event.title = "CLICKED!";
		$('#calendar').fullCalendar('updateEvent', event);
		$("#edit-event-button").click();
	},

	eventSources: [{
	    url: '{!! route('getevents') !!}',
	    type: 'GET',
	    error: function() {
	        alert('Ошибка соединения с источником данных!');
	    }
	}]
});
</script>
<script src="{{ asset('js/calendar-page.js') }}"></script>
@endsection