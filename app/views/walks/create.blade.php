@extends('layouts.base')

@section('title')
Start Walk
@stop

@section('content')
<div class="container">
  {{ Form::open(['route' => 'walk.store', 'class' => 'form-horizontal']) }}
    {{ Form::title('Start Walk') }}
    {{ Form::myText('duration', 'Duration (minutes)', 'text', $errors) }}
    {{ Form::mySelect('dog_friendliness', 'Dog Friendliness', ["0" => "friendly", "1" => "cordial", "2" => "neutral", "3" => "warning", "4" => "mean"] , $errors) }}
    {{ Form::mySelect('pace', 'Expected Pace', ["0" => "slow", "1" => "steady", "2" => "brisk", "3" => "jog"], $errors) }}
    {{ Form::myTextArea('comments', 'Additional Comments', $errors) }}
    {{ Form::mySubmit('Start') }} 
  {{ Form::close() }}
</div>
@stop
