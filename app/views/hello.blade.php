@extends('layouts.base')

@section('title')
Home
@stop

@section('content')
<style type="text/css">
      html, body { height: 100%; margin: 0; padding: 0; }
      #map { max-height: 400px; min-width: 30%; min-height:100px; max-width:50%}
      #main-doge {max-height:30%}
    </style>
<div class="container">
<h1> Get out with other dog lovers!</h1>
{{HTML::image('/img/doge.png','doge' , array("id" => "main-doge", "class" => "main-doge"))}}

</div>
@stop
