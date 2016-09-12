
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

	// CREACION DEL MARCADOR  
    marker = new google.maps.Marker({
		position: latLng,
		//title: 'Arrastra el marcador si quieres moverlo',
		map: map,
		//draggable: true
	});
  
	//Si el navegador lo permite, geolocalizar automaticamente con HTML5
	if (navigator.geolocation) {
		var infoWindow = new google.maps.InfoWindow({map: map});
		navigator.geolocation.getCurrentPosition(function(position) {
			var pos = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			};
		marker.setPosition(pos);
		infoWindow.setPosition(pos);
		infoWindow.setContent('El sistema te a ubicado en esta dirección');
		map.setCenter(pos);
		geocodePosition(pos);
		},	function() {
				handleLocationError(true, infoWindow, map.getCenter());
		});
	}
 
// Escucho el CLICK sobre el mama y si se produce actualizo la posicion del marcador 
     google.maps.event.addListener(map, 'click', function(event) {
     updateMarker(event.latLng);
   });
  
  // Inicializo los datos del marcador
  //    updateMarkerPosition(latLng);
     
      
 
  // Permito los eventos drag/drop sobre el marcador
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('Arrastrando...');
  });
 
  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerStatus('Arrastrando...');
    updateMarkerPosition(marker.getPosition());
  });
 
  google.maps.event.addListener(marker, 'dragend', function() {
    updateMarkerStatus('Arrastre finalizado');
    geocodePosition(marker.getPosition());
  });
  
}

// Permito la gesti¢n de los eventos DOM
google.maps.event.addDomListener(window, 'load', initialize);

// ESTA FUNCION OBTIENE LA DIRECCION A PARTIR DE LAS COORDENADAS POS
function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      updateMarkerAddress(responses[0].formatted_address);
	  //setear direccion campos separados
	  
	  document.getElementById('numero').value = responses[0].address_components[0].long_name;//numero
	  document.getElementById('calle').value = responses[0].address_components[1].long_name;//calle
					//console.log(responses[0].address_components[2].long_name);//ciudad
	  document.getElementById('comuna').value = responses[0].address_components[3].long_name;//comuna
					//console.log(responses[0].address_components[4].long_name);//provincia
					//console.log(responses[0].address_components[5].long_name);//region
					//console.log(responses[0].address_components[6].long_name);//chile 
    } else {
      updateMarkerAddress('No puedo encontrar esta direccion.');
    }
  });
}

// OBTIENE LA DIRECCION A PARTIR DEL LAT y LON DEL FORMULARIO
function codeLatLon() { 
      str= document.getElementById('longitud').value+" , "+ddocument.getElementById('latitud').value
      latLng2 = new google.maps.LatLng(document.getElementById('latitud').value ,document.getElementById('longitud').value);
      marker.setPosition(latLng2);
      map.setCenter(latLng2);
      geocodePosition (latLng2);
      // document.form_mapa.direccion.value = str+" OK";
}


function primero(){
	var num = document.getElementById('numero').value;
    var pos = num.lastIndexOf('-');
	if(pos==-1){
		codeAddress();
	}
	else{
		document.getElementById('numero').focus();
		document.getElementById('numero').select();
		alert('El campo número debe tener solo números');
	}
		
}

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

function updateMarkerStatus(str) {
  document.getElementById('direccion').value = str;
}

// RECUPERO LOS DATOS LON LAT Y DIRECCION Y LOS PONGO EN EL FORMULARIO
function updateMarkerPosition (latLng) {
  document.getElementById('longitud').value =latLng.lng();
  document.getElementById('latitud').value = latLng.lat();
}

function updateMarkerAddress(str) {
	document.getElementById('direccion').value = str;
}

// ACTUALIZO LA POSICION DEL MARCADOR
function updateMarker(location) {
        marker.setPosition(location);
        updateMarkerPosition(location);
        geocodePosition(location);
      }





</script>
 <style>
  #mapCanvas {
    width: 600px;
    height: 300px;
    float: center;
  } 
 </style>
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Crear cuenta';
$this->params['breadcrumbs'][] = $this->title;

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];
$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
$fieldUser = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];
$fieldPhone = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-phone form-control-feedback'></span>"
];

?>
<div class="site-signup">
   
    <div class="row">
		<div class="col-lg-1">
		</div>
			
        <div class="col-lg-4">
		</br>
		<h1><?= Html::encode($this->title) ?></h1>
		<p>Ingrese los siguiente datos para crear su cuenta:</p>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
				

				<?= $form
					->field($model, 'nombres', $fieldUser)
					->label(false)
					->textInput(['placeholder' => $model->getAttributeLabel('nombres')]) ?>
					
				<?= $form
					->field($model, 'apellidos', $fieldUser)
					->label(false)
					->textInput(['placeholder' => $model->getAttributeLabel('apellidos')]) ?>
				
				<?= $form
					->field($model, 'telefono', $fieldPhone)
					->label(false)
					->textInput(['placeholder' => $model->getAttributeLabel('telefono')]) ?>
				
				<?= $form
					->field($model, 'username', $fieldUser)
					->label(false)
					->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

				<?= $form
						->field($model, 'email', $fieldOptions1)
						->label(false)
						->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>

				<?= $form
						->field($model, 'password', $fieldOptions2)
						->label(false)
						->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
				    <div class="form-group">
						<?= Html::submitButton('Crear Cuenta', ['class' => 'btn btn-primary', 'name' => 'signup-button' , 'onmouseover' => 'check()']) ?>
					</div>
        </div>
					
		
		<div class="col-lg-4" style="position:relative; left: 70px;">
			</br></br></br>
					<table width="100%">
						<tr>
							<td width="30%"><input type="text" name="calle" id="calle" placeholder="Calle" class="form-control" style="width: 160px"/></td>
							<td width="15%"><input type="text" name="numero" id="numero" placeholder="Número" class="form-control" style="width: 110px"/></td>
							<td width="30%"><input type="text" name="comuna" id="comuna" placeholder="Comuna" class="form-control" style="width: 164px"/></td>
							<td width="25%"><input type="button" class="btn btn-success" value="Geolocalizar dirección" onclick="primero()"/></td>
						</tr>
					</table>
					<input type="hidden" name="direccion" id="direccion"/>
					<input type="hidden" id = "latitud" name="latitud" value="-36.6062618" style="width: 100px;font-size: 10px;font-family: verdana;font-weight: bold;" />	    
					<input type="hidden" id = "longitud" name="longitud" value="-72.1023351" style="width: 100px;font-size: 10px;font-family: verdana;font-weight: bold;" />			   
			<?php ActiveForm::end(); ?>    
			<small>Ingrese dirección para geolocalizar en el mapa:</small>
			<div id="mapCanvas"></div>
		</div>
    </div>
	
</div>

<script>
	function check(){
		var num = document.getElementById('numero').value;
		var pos = num.lastIndexOf('-');
		if(pos != -1){
			document.getElementById('numero').focus();
			document.getElementById('numero').select();
			alert('El campo número debe tener solo números');
		}
	}
	
	
</script>





