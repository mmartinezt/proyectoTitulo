<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

?>
<div class="user-view">

    <h1>Detalle Servicio</h1>
	<table class="table table-striped table-framed">
    <thead>
		<tr>
			<th class="headerSortasc"><a href="#">Nombre</a></th>
			<th><?php echo($nombre);?></th>
		</tr>
    </thead>
    <tbody>
			<tr>
				<td width="30%"><strong>Descripción</strong></td>
				<td><?php echo($descripcion);?></td>
			</tr>
			<tr>
				<td width="30%"><strong>Valor</strong></td>
				<td>$<?php echo(number_format($valor,0,',','.'));?></td>
			</tr>
			<tr>
				<td width="30%"><strong>Fecha Solicitud</strong></td>
				<td><?php echo(substr($fecha,0,10));?></td>
			</tr>
			<tr>
				<td width="30%"><strong>Fecha Ejecución</strong></td>
				<td><?php echo(  (substr($fechaE,0,4)=='000')? 'no asignado': $fechaE  );?></td>
			</tr>
			<tr>
				<td width="30%"><strong>Personal a cargo</strong></td>
				<td><?php echo( ($empleado==null)? 'no asignado':$empleado->nombres);?></td>
			</tr>
			<tr>
				<td width="30%"><strong>Estado</strong></td>
				<td><span class="label <?php echo(($estado==1)? 'pending':'active');?>"><?php echo(($estado==1)? 'pendiente':'activo');?></span></td>
			</tr>
    </tbody>
</table>


</div>
