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
	    	title: event_type.val(),
	    	start: event_start.val()+":00",
	    	end: event_end.val()+":00"
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