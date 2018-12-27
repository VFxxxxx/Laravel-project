@extends('adminlte::page')
@section('css')
	<link rel='stylesheet' href="{{ asset('css/fullcalendar.min.css') }}" />
@endsection

@section('content')
	<div id='calendar'></div>
@endsection

@section('js')
	<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('js/moment.js') }}"></script>
	<script src="{{ asset('js/fullcalendar.min.js') }}"></script>
	<script>
		  // page is now ready, initialize the calendar...
		  $('#calendar').fullCalendar({
		    // put your options and callbacks here
		  })
	</script>
@endsection