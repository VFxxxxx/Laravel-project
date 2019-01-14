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
	},
/*
	eventSources: [{
	    url: '/getevents',
	    type: 'POST',
	    data: {
	        op: 'source'
	    },
	    error: function() {
	        alert('Ошибка соединения с источником данных!');
	    }
	}]*/
});


$.datepicker.regional['ru'] = {
	closeText: 'Закрыть',
	prevText: '<Пред',
	nextText: 'След>',
	currentText: 'Сегодня',
	monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
	    'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'
	],
	monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн',
	    'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'
	],
	dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
	dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
	dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
	weekHeader: 'Не',
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['ru']);

var event_start = $('#event_start');
var event_end = $('#event_end');
var event_type = $('#event_type');
var calendar = $('#calendar');
var event_id = $('#event_id');

event_start.datetimepicker({dateFormat: 'yy-mm-dd'});
event_end.datetimepicker({dateFormat: 'yy-mm-dd'});

/** функция очистки формы */
function emptyForm() {
    event_start.val("");
    event_end.val("");
    event_type.val("");
    event_id.val("");
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$("#form-create-event").submit(function( event ) {
	event.preventDefault();
	$(".close").click();
	
    //отправка ajax запроса добавления события
	$.ajax(
	{
	    url: "calendar",
	    type: 'POST',
	    dataType: "JSON",
	    data: {
	    	start: event_start.val()+":00",
	    	end: event_end.val()+":00",
	    	type: event_type.val()
	    },
	    sync: false,
	    success: function(html) {
	    	console.log(html);
	    },
	    error: function(xhr) {
	     console.log(xhr.responseText);
	   }
	});

	 emptyForm();
});