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
              <p>Cantidad Productos</p>
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
            <a href="<?php echo(Url::toRoute('cliente-servicio-peticion/index')); ?>" class="small-box-footer">Ver Solicitud de Servicios pendientes <i class="fa fa-arrow-circle-right"></i></a>
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
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d51241.28499065762!2d-72.13873128130459!3d-36.61241578018611!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9668d7c2b6f00259%3A0x14fe84c4f1092ea8!2zQ2hpbGxhbiwgQ2hpbGzDoW4sIFJlZ2nDs24gZGVsIELDrW8gQsOtbw!5e0!3m2!1ses-419!2scl!4v1467272098310" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
		
</div>
