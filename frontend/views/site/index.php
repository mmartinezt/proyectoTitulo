<!DOCTYPE html>
<!--
 * A Design by GraphBerry
 * Author: GraphBerry
 * Author URL: http://graphberry.com
 * License: http://graphberry.com/pages/license
-->

<html lang="en">
    <meta charset=utf-8>
        <title>Seguridad controlada con tu SmartPhone</title>
        <!-- Load Roboto font -->
        
		<!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="archivosIndex/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="archivosIndex/css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="archivosIndex/css/style.css" />
        <link rel="stylesheet" type="text/css" href="archivosIndex/css/pluton.css" />
		</script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUQz_nxkXfvOZ2yI1KFj9k8R0sJoJaatA&callback=initializeMap">
    </script>
		
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->

        <!-- Fav and touch icons -->
        
		
<style>
  .active {
       pointer-events: none;
       cursor: default;
    } 
</style>
<script>
$("html, body").animate({
    scrollTop: 1
}, 2);
</script>
<?php
$archivo = "log.txt";
$manejador = fopen($archivo,"a") or die("Imposible abrir el archivo\n");
$ip = $_SERVER['REMOTE_ADDR']."\r\n";
fwrite($manejador,$ip);
fclose($manejador);
?>		
    <body>  
        <!-- Start home section -->
        <div id="home">
            <!-- Start cSlider -->
            <div id="da-slider" class="da-slider">
                <div class="triangle"></div>
                <!-- mask elemet use for masking background image -->
                <div class="mask"></div>
                <!-- All slides centred in container element -->
                <div class="container">
                    <!-- Start first slide -->
                    <div class="da-slide">
                        <h2 class="fittext2">bienvenido a Smart Full-Security</h2>
                        <h4>Seguridad Controlada a través de tu SmartPhone</h4>
                        <p>Hoy en día, existe gran cantidad de tecnología para que tu casa o negocio este segura y protegida. SMART FULL-SECURITY te presenta gran cantidad de alternativas para proteger tus propiedades a través de tu SmartPhone y uso de Internet.
						  Sigue leyendo...</p>
						<a href="#service" class="da-link button">Read more</a>
                        <div class="da-img">
                            <img src="archivosIndex/images/Slider01.png" alt="image01" width="320">
                        </div>
                    </div>
                    <!-- End first slide -->
                    <!-- Start second slide -->
                    <div class="da-slide">
                        <h2 class="fittext2">ALARMA con GSM + PSTN GSM707</h2>
                        <h4>Última tecnología en Alarmas, con doble seguridad.</h4>
                        <p>Única con doble sistema de comunicación, por linea telefónica y por Celular, sistema seguro y confiable. Permite monitorear su casa en modo remoto a través de su celular. Incluye Sensores magnéticos, de movimiento infrarrojos, controles remoto con botón de pánico.</p>
						<a href="#service" class="da-link button">Read more</a>
                        <div class="da-img">
                            <img src="archivosIndex/images/Slider02.png" alt="image01" width="320">
                        </div>
                    </div>
                    <!-- End second slide -->
                    <!-- Start third slide -->
                    <div class="da-slide">
                        <h2 class="fittext2">bienvenido a Smart Full-Security</h2>
                        <h4>Seguridad Controlada a través de tu SmartPhone</h4>
                        <p>Hoy en día, existe gran cantidad de tecnología para que tu casa o negocio este segura y protegida. SMART FULL-SECURITY te presenta gran cantidad de alternativas para proteger tus propiedades a través de tu SmartPhone y uso de Internet.
						  Sigue leyendo...</p>
						<a href="#service" class="da-link button">Read more</a>
                        <div class="da-img">
                            <img src="archivosIndex/images/Slider01.png" alt="image01" width="320">
                        </div>
                    </div>
                    <!-- Start third slide -->
                    <!-- Start cSlide navigation arrows -->
                    <div class="da-arrows">
                        <span class="da-arrows-prev"></span>
                        <span class="da-arrows-next"></span>
                    </div>
                    <!-- End cSlide navigation arrows -->
                </div>
            </div>
        </div>
        <!-- End home section -->
        <!-- Service section start -->
        <div class="section primary-section" id="service">
            <div class="container">
                <!-- Start title section -->
                <div class="title">
                    <h1>¿Qué Ofrecemos?</h1>
                    <!-- Section's title goes here -->
                    <p>Nos especializamos en la asesoría, venta, instalación y mantención de sistemas de seguridad y vigilancia.</p>
                    <!--Simple description for section goes here. -->
                </div>
                <div class="row-fluid">
                    <div class="span4">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <a href="#service"> 
								<img class="img-circle" src="archivosIndex/images/Service1.png" alt="service 1"> 
                            </div>
                            <h3>Cámaras de Seguridad</h3>
                            <p>Vea y controle en tiempo real su hogar o empresa en imagen HD desde su SmartPhone o cualquier dispositivo con acceso a internet.</p>
								</a>
						</div>
                    </div>
					<div class="span4">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
								<a data-toggle="modal" data-target="#mAbout"> 
                                <img class="img-circle" src="archivosIndex/images/Service2.png" alt="service 2" />
                            </div>
                            <h3>Sistema de Alarmas GSM</h3>
                            <p>Active o desactive su alarma con control a distancia o SmartPhone. Sensores inalámbricos con llamada a celular. </p>
								</a>
                        </div>
                    </div>
					<div class="span4">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
							<a href="#service"> 
                                <img class="img-circle" src="archivosIndex/images/Service3.png" alt="service 3">
                            </div>
                            <h3>Mantención y actualización de equipos</h3>
                            <p>Si ya cuentas con un sistema de alarmay y/o cámaras de seguridad. Actualiza tu servicio y controla desde tu SmartPhone. </p>
                            </a>
						</div>
                    </div>					
                    <div class="span6">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
								<a href="#service"> 
                                <img class="img-circle" src="archivosIndex/images/Service3.png" alt="service 3">
                            </div>
                            <h3>Portones Automáticos</h3>
                            <p>Abre tu entrada de vehículo con un solo </br>botón a distancia. </p>
								</a>
                        </div>
                    </div>
					<div class="span4">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
								<a href="#service"> 
                                <img class="img-circle" src="archivosIndex/images/Service3.png" alt="service 3">
                            </div>
                            <h3>Cercos Electricos</h3>
                            <p>Protege el perimetro de tu propiedad.</p>
								</a>
                        </div>
                    </div>
					
                </div>
            </div>
        </div>
        <!-- Service section end -->


        <!-- Price section start -->
        <div id="price" class="section secondary-section">
            <div class="container">
                <div class="title">
                    <h1>Promociones</h1>
                    <p>Promoción <font color="yellow"<strong>AGOSTO</strong></font> válidas hasta 01-Septiembre-2016</p>
                </div>
                <div class="price-table row-fluid">
                    <div class="span4 price-column">
                        <h3>Cámaras Seguridad</h3>
                        <ul class="list">
                            
                            <li><strong>4 cámaras</strong> HD</li>
                            <li><strong>DVR</strong> cuatro canales</li>
                            <li><strong></strong> configuración local y de SmartPhone</li>
                        </ul>
                        <a href="#Contact" class="button button-ps" >La quiero</a>
                    </div>
                    <div class="span4 price-column">
                        <h3>Alarma GSM</h3>
                        <ul class="list">
                            
                            <li><strong>2 sensores</strong> de movimiento</li>
                            <li><strong>4 sensores</strong> magnéticos</li>
                            <li><strong>2 Controles</strong> a distancia + Sirena</li>
							<li><strong>Intalacion Incluida</strong> configuración local y de SmartPhone</li>
                        </ul>
                        <a href="#Contact" class="button button-ps">La quiero</a>
                    </div>
                    <div class="span4 price-column">
                        <h3>Cámaras + Alarma GSM</h3>
                        <ul class="list">
                            
                            <li><strong>incluye</strong> promoción 1</li>
                            <li><strong>incluye</strong> promoción 2</li>
                            <li><strong>Intalacion Incluida</strong> configuración local y de SmartPhone</li>
                        </ul>
                        <a href="#Contact" class="button button-ps">La quiero</a>
                    </div>
                </div>
                <div class="centered">
                    <p class="price-text">Si necesita mas especificaciones sobre estas promociones, comuníquese con nosotros. <font color = "#015C1C">Estamos conectados</font>.</p>
                    <a href="#contact" class="button">Escríbenos!</a>
                </div>
            </div>
        </div>
        <!-- Price section end -->
        <!-- Newsletter section start -->
        <div class="section third-section">
            <div class="container newsletter">
                <div class="sub-section">
                    <div class="title clearfix">
                        <div class="pull-left">
                            <h3>Infórmate sobre nuevas promociones</h3>
                        </div>
                    </div>
                </div>
                <div id="success-subscribe" class="alert alert-success invisible">
                    <strong>Muy bien!</strong>Te mantendremos informado.</div>
                <div class="row-fluid">
                    <div class="span5">
                        <p>Déjanos tu Email y te mantendremos informado sobre nuevas promociones, tecnologías, videos demostrativos y nuevas capacidades de tu SmartPhone para controlar tu seguridad.</p>
                    </div>
                    <div class="span7">
                        <form class="inline-form">
                            <input type="email" name="email" id="nlmail" class="span8" placeholder="Escribe tu email" required />
                            <button id="subscribe" class="button button-sp">Subscribe</button>
                        </form>
                        <div id="err-subscribe" class="error centered"><Strong>Por favor, déjanos un email válido.</strong></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter section end -->
        <!-- Contact section start -->
        <div id="contact" class="contact">
            <div class="section secondary-section">
                <div class="container">
                    <div class="title">
                        <h1>Contáctenos</h1>
                        <p>realiza tus consultas, solicita una cotización... escríbenos, respondéremos a la brevedad.</p>
                    </div>
                </div>
                <div class="map-wrapper">
                    <div class="map-canvas" id="map-canvas">Cargando Coordenadas...</div>
                    <div class="container">
                        <div class="row-fluid">
                            <div class="span5 contact-form centered">
                                <h3>Hola!</h3>
                                <div id="successSend" class="alert alert-success invisible">
                                    <strong>Muy bien!</strong>hemos recibido tu mensaje, nos mantendremos comunicados.</div>
                                <div id="errorSend" class="alert alert-error invisible">ERROR, imposible enviar tu mensaje, por favor revisa los datos.</div>
                                <form id="contact-form" action="archivosIndex/php/mail.php">
                                    <div class="control-group">
                                        <div class="controls">
                                            <input class="span12" type="text" id="name" name="name" placeholder="* Su nombre..." />
                                            <div class="error left-align" id="err-name">Por favor, ingrese su nombre.</div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <input class="span12" type="email" name="email" id="email" placeholder="* Su email..." />
                                            <div class="error left-align" id="err-email">Por favor, ingrese su dirección de email.</div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <textarea class="span12" name="comment" id="comment" placeholder="* Cuerpo del mensaje..."></textarea>
                                            <div class="error left-align" id="err-comment">Por favor Ingrese su mensaje</div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button id="send-mail" class="message-btn">Enviar mensaje</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="span9 center contact-info">
                        <p></p>
                        <p class="info-mail">contacto@smartfullsecurity.cl</p>
                        <p>+569 7889 5602</p>
                        <p>+569 5003 1710</p>
                        <div class="title">
                            <h3>Encuéntranos en Redes Sociales</h3>
                        </div>
                    </div>
                    <div class="row-fluid centered">
                        <ul class="social">
                            <li>
                                <a href="http://www.facebook.com/veranoseguro">
                                    <span class="icon-facebook-circled"></span>
                                </a>
                            </li>
                        </ul>
                    </div>



<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="row-fluid centered">
    <div class="fb-like" data-href="https://www.facebook.com/veranoseguro" data-width="200" data-layout="standard" data-action="like" data-show-faces="true"     data-share="true"></div>
</div>

<br>
<br>

                    <div class="row-fluid centered">
                          <a href="" target="_Blank" title="contador de visitas">Eres el visitante número</a><br>
                           <script type="text/javascript" src="http://counter5.fcs.ovh/private/countertab.js?c=51ae74597fb8ec4eb967599315d26b0a"></script>
                          <br><a href="" target="_Blank" title="contador de visitas">Gracias por visitar nuestra Web</a><br>
                    </div>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-75840331-1', 'auto');
  ga('send', 'pageview');

</script>

                </div>
            </div>
        </div>
        <!-- Contact section edn -->
        <!-- Footer section start -->
        <div class="footer">
            <p>&copy; 2016 Smart full Security, Sitio web creado por <strong>Miguel Martínez T.</strong></p>
        </div>
        <!-- Footer section end -->
        <!-- ScrollUp button start -->
        <div class="scrollup">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div>
        <!-- ScrollUp button end -->
        <!-- Include javascript -->



	</div>
	

    </body>
</html>



