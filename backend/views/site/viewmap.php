<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Servicio */
?>
<div class="servicio-view">
	<div id="mapCanvas"></div>
</div>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTBAPgAViiNcLiKvHOD5jDWusVBePea90&signed_in=true"></script>

<script type="text/javascript">

// VARIABLES GLOBALES JAVASCRIPT
var geocoder;
var marker;
var latLng;
var latLng2;
var map;

// INICiALIZACION DE MAPA
function initialize() {
  geocoder = new google.maps.Geocoder();	
  latLng = new google.maps.LatLng(-36.6062618 ,-72.1023351);

  map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom:13,
    center: latLng,
     });

	var contentString = 
	  '<div id="infocontent">'+
		  '<div id="siteNotice">'+
		  '</div>'+
		  '<h2 id="firstHeading" class="firstHeading">Información de cliente</h2>'+
		  '<div id="bodyContent">'+
		  '<p><b>Nombre Cliente: </b>nombre y apellido</p>'+
		  '<p><b>Teléfono contacto: </b>+569 7279 1564</p>'+
		  '<p><b>Servicios Activos: </b><a href="#">13</a> - <a href="#">14</a> - <a href="#">15</a></p>'+
	   
		  '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
    content: contentString
  });

  var marker = new google.maps.Marker({
    position: latLng,
    map: map,
    title: 'Uluru (Ayers Rock)'
  });
  marker.addListener('click', function() {
    infowindow.open(map, marker);
  });
}

// Permito la gesti¢n de los eventos DOM
google.maps.event.addDomListener(window, 'load', initialize);

// OBTIENE LAS COORDENADAS DESDE lA DIRECCION EN LA CAJA DEL FORMULARIO
function codeAddress() {
        var address = document.getElementById('calle').value + ' ' + '' + ', ' + document.getElementById('comuna').value;
			console.log(address);
		 geocoder.geocode( { 'address': address}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
             updateMarkerPosition(results[0].geometry.location);
             marker.setPosition(results[0].geometry.location);
             map.setCenter(results[0].geometry.location);
           } else {
            alert('ERROR : ' + status);
          }
        });
      }

</script>
 <style>
  #mapCanvas {
    width: 100%;
    height: 700px;
    float: center;
  } 
 </style>


