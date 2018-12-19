@extends('adminlte::page')

@section('content')
	<div class="box-body">
		<form>
		  <div class="form-group">
		    <label for="exampleInputTitle">Title</label>
		    <input type="text" class="form-control"  placeholder="Title">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputTitle">Body</label>
		    <textarea class="form-control"  placeholder="Body">Enter text here...</textarea>
		  </div>
		  <button type="submit" class="btn btn-primary">Add</button>
		</form>
		<a href="/articles">Back</a>
	</div> 
@endsection