<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use backend\models\Producto;
use backend\models\ClienteServicioPeticion;
use backend\models\Oferta;
use yii\Helpers\ArrayHelper;

$prds=ArrayHelper::map(Producto::find()->all(),'id_prodcto','nombre_producto');
$ofertas=ArrayHelper::map(Oferta::find()->all(),'id_oferta','id_producto');
$solicitudes=ArrayHelper::map(ClienteServicioPeticion::find()->all(),'id_cliente_servicio_peticion','id_cliente');

?>
<div class="site-index">


<!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo (count($prds)); ?></h3>
              <p>Productos en inventario</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
			
            <a href="<?php echo(Url::toRoute('producto/index')); ?>" class="small-box-footer">Ver Todos <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo (count($ofertas)); ?><sup style="font-size: 20px"></sup></h3>
              <p>Promociones Activas</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo(Url::toRoute('oferta/index')); ?>" class="small-box-footer">Ver Promociones <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo (count($solicitudes)); ?></h3>
              <p>Servicios Pendientes</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo(Url::toRoute('cliente-servicio-ejecucion/index')); ?>" class="small-box-footer">Ver Solicitud de Servicios pendientes <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>0</h3>

              <p>Cotizaciones Pendientes</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Ver Cotizaciones Pendientes <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
<div class="row">
<h1> Geolocalización de Clientes </h1>
<div align = "right"><a href="<?php echo(Url::to(['site/viewmap']));?>">ver pantalla completa</a></div>
<div id="mapCanvas"></div>
</div>
		
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
    title: 'Nombre de Cliente'
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
    height: 300px;
    float: center;
  } 
 </style>

