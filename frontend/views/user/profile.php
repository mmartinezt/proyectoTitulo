<?php
use himiklab\colorbox\Colorbox;
use yii\helpers\Url;
use backend\models\Cotizacion;
use backend\models\ClienteServicioEjecucion;
use backend\models\ClienteServicioPeticion;
use backend\models\CotizacionServicio;
use yii\Helpers\ArrayHelper;

?>
<link href="css/AdminLTE.min.css" rel="stylesheet">
<link href="css/AdminLTE.css" rel="stylesheet">
<link href="css/font-awesome/css/font-awesome.css" rel="stylesheet">
<?= Colorbox::widget([
    'targets' => [
        '.colorbox' => [
            'maxWidth' => '90%',
            'maxHeight' => '90%',
        ],
    ],
    'coreStyle' => 1
]) ?>
</br>
</br>
</br>
</br>

<section class="content">

      <div class="row">
		<div class="col-xs-1">
		</div>
        <div class="col-xs-2">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?= Yii::$app->request->baseUrl ?>/images/usuario-registrado.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo($cliente->nombres.' '.$cliente->apellidos); ?></h3>
              <p class="text-muted text-center"><?php echo(($model->role==1)? 'Cliente':'Administrador')?></p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Rut</b> <a class="pull-right"><?php echo($cliente->rut_cliente);?></a>
                </li>
                <li class="list-group-item">
                  <b>Tel&#233;fono</b> <a class="pull-right"><?php echo($cliente->telefono);?></a>
                </li>
                <li class="list-group-item">
                  <b>Celular</b> <a class="pull-right"><?php echo($cliente->celular);?></a>
                </li>
              </ul>

              <a href="<?php echo(Url::toRoute(['cliente/updatecliente', 'id'=>$model->id])); ?>" class="btn btn-primary btn-block colorbox"><b>Editar</b></a>
            </div>
            <!-- /.box-body -->
          </div>
		  
		   <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username"><?php echo('Datos de Empresa'); ?></h3>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Nombre</b> <a class="pull-right"><?php echo($empresa->nombre_empresa);?></a>
                </li>
                <li class="list-group-item">
                  <b>Rut</b> <a class="pull-right"><?php echo($empresa->rut_empresa);?></a>
                </li>
				<li class="list-group-item">
                  <b>Fantasia</b> <a class="pull-right text-right"><?php echo($empresa->nombre_fantasia);?></a>
                </li>
				<li class="list-group-item">
                  <b>Giro</b> <a class="pull-right  text-center"><?php echo($empresa->giro_empresa);?></a>
				  </br>
				   </br>
				    </br>
					</br>
                </li>
              </ul>
              <a href="<?php echo(Url::toRoute(['empresa/updateempresa', 'id'=>$cliente->rut_empresa, 'id_user'=>$cliente->id_usuario])); ?>" class="btn btn-primary btn-block colorbox"><b>Editar</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Servicios</a></li>
               <!--<li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">Ubicación</a></li>-->
               <!--<li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Ofertas</a></li>-->
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="activity">
    
<style>	
    .table-framed {
    border: 1px solid #DDD;
    border-collapse: separate;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}
.table-striped tbody tr:nth-child(odd) td,
.table-striped tbody tr:nth-child(odd) th {
  background-color: #f9f9f9;
}
table.table-striped tr td {
    vertical-align: middle;
}
table.table-striped tr.subtotal td {
    background-color:#FFFFDD;
    font-weight: bold;
}
table.table-striped tr.tax td {
    background-color:#EBF2FE;
    font-weight: bold;
}
table.table-striped tr.credit td {
    background-color:#FFE1E1;
    font-weight: bold;
}
table.table-striped tr.total td {
    background-color:#E7FFDA;
    font-weight: bold;
}
table.table-striped tr.recurring td {
    background-color:#FFE1E1;
    font-weight: bold;
}
.whmcscontainer table .headerSortasc {
    background-color: rgba(141, 192, 219, 0.25);
    text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
    background-image:url('../img/sortasc.png');
    background-repeat:no-repeat;
    background-position:95% 50%;
}
.label.pending {
    background-color: #F89406;
}
.label.active {
    background-color: green;
}
</style>
<?php 

$query = (new \yii\db\Query())
    ->select('servicio.id_servicio, servicio.nombre, servicio.descripcion, servicio.valor, cliente_servicio_peticion.fecha, cliente_servicio_ejecucion.fecha as fechaE, cliente_servicio_ejecucion.estado, id_cliente_ejecucion')
    ->from('cliente_servicio_peticion, cotizacion_servicio, servicio, cliente_servicio_ejecucion')
	->where('id_cliente='.$cliente->id_cliente.' 
			 and cliente_servicio_peticion.id_cotizacion= cotizacion_servicio.id_cotizacion 
			 and cotizacion_servicio.id_servicio=servicio.id_servicio
			 and cliente_servicio_peticion.id_cliente_servicio_peticion = cliente_servicio_ejecucion.id_cliente_peticion');
$command = $query->createCommand();
$datos = $command->queryAll();
?>

<h1><font color="red">Mis Servicios</font></h1>
<table class="table table-striped table-framed">
    <thead>
		<tr>
			<th class="headerSortasc"><a href="#">Servicio</a></th>
			<th><a href="#">Precio</a></th>
			<th><a href="#">Fecha</a></th>
			<th><a href="#">Estado</a></th>
			<th>&nbsp;</th>
		</tr>
    </thead>
    <tbody>
		<?php 		
			foreach($datos as $dato){		
		?>
			<tr>
				<td width="50%"><font <?php echo(($dato['id_servicio']==0)? 'color="red"':'');?>><strong><?php echo(strtoupper(strstr($dato['nombre'],' ',true)));?></strong></br><?php echo(strstr($dato['nombre'],' '));?></font></td>
				<td>$<?php echo(number_format($dato['valor'],0,',','.'));?></td>
				<td><?php echo(substr($dato['fecha'],0,10));?></td>
				<td><span class="label <?php echo(($dato['estado']==1)? 'pending':'active');?>"><?php echo(($dato['estado']==1)? 'pendiente':'activo');?></span></td>
				<td>
					<div class="btn-group">
					<a class="btn btn colorbox" href="<?php echo(Url::toRoute(['user/detalle', 'nombre'=>$dato['nombre'], 'descripcion'=>$dato['descripcion'], 'valor'=>$dato['valor'], 'fecha'=>$dato['fecha'], 'fechaE'=>$dato['fechaE'], 'estado'=>$dato['estado'], 'id_cliente_ejecucion'=>$dato['id_cliente_ejecucion'] ])); ?>"> <i class="fa fa-list-alt"></i> Ver Detalles</a>
									</div>
				</td>
			</tr>
        <?php
			}
		?>
    </tbody>
</table>
<?php 
	//crea arreglo
	$fechas=ArrayHelper::map(Cotizacion::find()->where(['id_cliente' => $cliente->id_cliente])->all(),'id_cotizacion','fecha');
	//ordena arreglo según fecha en orden menor a menor
	asort($fechas);
	?>
</br>

<h1><font color="red">Cotizaciones Solicitadas</font></h1>
</br>		
                <div class="post">
					<ul class="timeline timeline-inverse">
					<?php foreach($fechas as $id=>$fecha){ ?>
						<li class="time-label"> <span class="bg-red"><?php echo(substr($fecha,0,10)); ?></span> </li>
						<li>
							<i class="fa fa-envelope bg-blue"></i>
							<div class="timeline-item">
								<span class="time"><i class="fa fa-clock-o"></i><?php echo(substr($fecha,11,8)); ?></span>
								<h3 class="timeline-header"><a href="#">Cotización</a></h3>
								<div class="timeline-body">
									<a class="btn btn-success btn-xs colorbox" href="<?php echo(Url::toRoute(['cotizacion/viewmodal', 'id'=>$id])); ?>">Ver Cotización</a>
								</div>
							</div>
						</li>
							
						<?php }?>
						<li>
							<i class="fa fa-clock-o bg-gray"></i>
						</li>
					</ul>
				</div>
			
                
    </div><!-- fin de primer menú -->
			  
              <!-- segundo menú -->
              <div class="tab-pane" id="timeline">
				holi :D
              </div>
			  <!-- /.fin segundo menú -->
			  
             <!-- Tercer menú -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
		<div class "col-sm-1">
		</div>
      </div>
      <!-- /.row -->
