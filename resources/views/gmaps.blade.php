@extends('layouts.app')

@section('content')


  

  <h1>Mapa de {{ $producto->nombre }}</h1>


  <div id="mymap"></div>


  <script type="text/javascript">
    var locations = <?php print_r(json_encode($locations)) ?>;
    var mymap = new GMaps({
      el: '#mymap',
      lat: 4.5877802,
      lng: -73.3878546,
      zoom:6
    });
    $.each( locations, function( index, value ){
	    mymap.addMarker({
		  lat: value.lat,
	      lng: value.lng,
	      title: value.nombre,
	      click: function(e) {
	        alert('En '+value.nombre+', hay '+(value.pivot.cantidad != undefined ? value.pivot.cantidad : 0 )+' productos ');
	      }
	    });
   });
  </script>

@endsection