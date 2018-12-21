@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="list-group">
  <a class="list-group-item list-group-item-action active" href="#list-home">Home</a>
  <!--
  <a class="list-group-item list-group-item-action" href="#">Profile</a>
  <a class="list-group-item list-group-item-action" href="#">Change Password</a>
-->
  <a class="list-group-item list-group-item-action"  href="/users">All users</a>
  <a class="list-group-item list-group-item-action"  href="/users/create">Create user</a>
</div>
@stop