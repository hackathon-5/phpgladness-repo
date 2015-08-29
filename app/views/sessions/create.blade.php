@extends('layouts.base')

@section('title')
Login
@stop

@section('content')
<div class="container">
  {{ Form::open(['route' => 'sessions.store', 'class' => 'form-horizontal']) }}
    {{ Form::title('Login') }}
    {{ Form::myText('username', 'Username', 'text', $errors) }}
    {{ Form::myText('password', 'Password', 'password', $errors) }}
    {{ Form::mySubmit('Login') }}
  {{ Form::close() }}
</div>
@stop
