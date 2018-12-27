@extends('adminlte::page')
@section('css')
	<link rel='stylesheet' href="{{ asset('css/fullcalendar.min.css') }}" />
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
</div>
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