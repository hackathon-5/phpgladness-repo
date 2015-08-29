@extends('layouts.base')
@section('title') Nearby Walks @stop

@section('content')
  <div class="container">
    <div id="map"></div>
  </div>
  <script type="text/javascript">

  var map;
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 32.776818, lng: -79.933647}, zoom: 10 });

    @foreach($walks as $walk)
    var myPosition = new google.maps.LatLng({{ $walk->user->xCoordinate }}, {{ $walk->user->yCoordinate }})
    var marker_{{ $walk->id }} = new google.maps.Marker({
      position : myPosition, title : "{{ $walk->user->name }}"});
    marker_{{ $walk->id }}.setMap(map);
    var contentString = '<div id="content" class="infoWindow">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h3 id="firstHeading" class="firstHeading">{{ $walk->user->name }} </h3>'+
      '<li>Dog Friendliness: {{ $walk->get_friendliness() }}</li>' +
      '<li>Pace: {{ $walk->get_pace() }}</li>' +
      '<li>Ending in: {{ $walk->get_time_remaining() }} minutes</li>' +
      '<div class="noticeComment">'+
      "{{ $walk->comments }}" + 
      '</div>'+
      '</div>';
    var infowindow_{{ $walk->id }} = new google.maps.InfoWindow({
      content: contentString
    });
    marker_{{ $walk->id }}.addListener('click', function() {
      infowindow_{{ $walk->id }}.open(map, marker_{{ $walk->id }});
    });
    @endforeach
  }


  
  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDbTrFVp4DI6i5Sg25KpJJ6cMIIW58TgI&callback=initMap">
  </script>
  
@stop
