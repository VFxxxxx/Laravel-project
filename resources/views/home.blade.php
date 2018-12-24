@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="list-group">
  <a class="list-group-item list-group-item-action active" href="#list-home">Главная</a>
  <!--
  <a class="list-group-item list-group-item-action" href="#">Profile</a>
  <a class="list-group-item list-group-item-action" href="#">Change Password</a>
-->
  <a class="list-group-item list-group-item-action"  href="/users">Все пользователи</a>
  <a class="list-group-item list-group-item-action"  href="/users/create">Создать пользователя</a>
</div>
@stop