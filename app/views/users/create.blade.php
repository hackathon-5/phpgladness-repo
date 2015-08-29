@extends('layouts.base')
@section('title') Create User @stop
@section('content')
  <div class="container">
    {{ Form::open(['route' => 'user.store', 'class'=>"form-horizontal"]) }}
      {{ Form::title('Register') }}
      {{ Form::myText('name', 'Name', 'text', $errors) }}
      {{ Form::myText('username', 'Username', 'text', $errors) }}
      {{ Form::mySelect('gender', 'Sex', ['0' => 'Male', '1' => 'Female'], $errors) }}
      {{ Form::myText('email', 'Email', 'text', $errors) }}
      {{ Form::myText('street', 'Street', 'text', $errors) }}
      {{ Form::myText('city', 'City', 'text', $errors) }}
      {{ Form::myText('state', 'State', 'text', $errors) }}
      {{ Form::myText('zip', 'Zip Code', 'text', $errors) }}
      {{ Form::myText('password', 'Password', 'password', $errors) }}
      {{ Form::myText('confirm_password', 'Confirm Password', 'password', $errors) }}
      {{ Form::mySubmit('Register') }}
    {{ Form::close() }}
  </div>
@stop

