

<?php

use backend\models\Cotizacion;
use backend\models\CotizacionProducto;
use backend\models\CotizacionServicio;
use backend\models\Producto;
use backend\models\Servicio;
use backend\models\Cliente;
use backend\models\Empresa;
use yii\Helpers\ArrayHelper;

$cotizacion=Cotizacion::find()->where(['id_cotizacion' => $id])->one();
$cliente=Cliente::find()->where(['id_cliente' => $cotizacion->id_cliente])->one();

$CotizacionProductos=ArrayHelper::map(CotizacionProducto::find()->where(['id_cotizacion' => $cotizacion->id_cotizacion])->all(),'id_producto','id_cotizacion');
$CotizacionServicios=ArrayHelper::map(CotizacionServicio::find()->where(['id_cotizacion' => $cotizacion->id_cotizacion])->all(),'id_servicio','id_cotizacion');

//si no tiene rut de empresa mostrar rut de cliente en la cotizacion
if($cliente->rut_empresa==''){
	$rut = $cliente->rut_cliente;
	$razonSocial= $cliente->nombres.' '.$cliente->apellidos;
}
else{
	$empresa = Empresa::find()->where(['rut_empresa' => $cliente->rut_empresa])->one();
	$rut = $empresa->rut_empresa;
	$razonSocial = $empresa->giro;
}

$indice=0;
$productosIDs = array();
$productoDescripcion = array();
$productoPrecios = array();
$serviciosIDs = array();
$serviciosDescripcion = array();
$servicioPrecios = array();
	foreach($CotizacionProductos as $producto=>$coti){
		$pro=Producto::find()->where(['id_prodcto' => $producto])->one();
		$productosIDs[$indice] = $pro->id_prodcto;
		$productoDescripcion[$indice] = $pro->nombre_producto;
		$productoPrecios[$indice] = $pro->precio_venta;
		$indice++;
		
	}
	$indice=0;
	foreach($CotizacionServicios as $servicio=>$coti){
		$ser=Servicio::find()->where(['id_servicio' => $servicio])->one();
		$serviciosIDs[$indice] = $ser->id_servicio;
		$servicioDescripcion[$indice] = $ser->nombre;
		$servicioPrecios[$indice] = $ser->valor;
		
		$indice++;
		
	}
	
	
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


</head>

<body>
<div align="center">
<table width="100%">
  <tr>
    <td width="75%" colspan="4" border="1"><img src="images/logoCotizacion.png" width="114" height="114"/></td>
	
	<td width="25%" style="text-align:center; border:1; border-color:#6E6E6E; line-height: 2em;"><font color="#848484"> <strong>RUT: 76.779.540-8 </p> COTIZACIÓN </p>Nº <?php echo($cotizacion->id_cotizacion);?> </strong></font></td>
	
  </tr>
  <tr>
    <td width="89%" colspan="4" style="text-align:LEFT; line-height: 0em;">
     <strong>
        <span class="text">SMART FULL SECURITY</span><br />
        <span class="text">CAMINO PARQUE LANTAÑO #765</span><br />
        <span class="text">FONO: 422235736 +569971050031</span><br />
        <span class="text">eMAIL: VENTAS@SMARTFULLSECURITY.CL</span>
     </strong>
    </td>
  </tr>
  <br />
  <br />
</table>
<table width="100%" border="1" style="border-collapse:collapse;">
  <tr>
		<td width="20%" style="text-align:right; margin:5px; padding:5px;">Razón Social</td>
		<td width="40%" style="text-align:left; margin:5px; padding:5px;"><strong class="text"><?php echo($razonSocial);?></strong></td>
		<td width="20%" style="text-align:right; margin:5px; padding:5px;">RUT</td>
		<td width="20%" style="text-align:left; margin:5px; padding:5px;"><?php echo($rut);?></td>
    </tr>
	<tr>
		<td width="20%" style="text-align:right; margin:5px; padding:5px;">Dirección</td>
		<td width="40%" style="text-align:left; margin:5px; padding:5px;"><?php echo($cliente->calle.' #'.$cliente->numero);?></td>
		<td width="20%" style="text-align:right; margin:5px; padding:5px;">Fecha</td>
		<td width="20%" style="text-align:left; margin:5px; padding:5px;"><?php echo (substr($cotizacion->fecha,0,-8));?></td>
    </tr>
	<tr>
		<td width="20%" style="text-align:right; margin:5px; padding:5px;">Comuna</td>
		<td width="40%" style="text-align:left; margin:5px; padding:5px;"><?php echo($cliente->comuna);?></td>
		<td width="20%" style="text-align:right; margin:5px; padding:5px;">Fono</td>
		<td width="20%" style="text-align:left; margin:5px; padding:5px;"><?php echo($cliente->celular); ?></td>
    </tr>
</table><br />

<table width="100%" border="1" style="border-collapse:collapse; ">
  <tr>
		<td width="20%" style="text-align:right; margin:5px; padding:5px;">Comentarios</td>
		<td width="80%" style="text-align:left; margin:5px; padding:5px;"> <?php echo($cotizacion->comentario);?></td>
    </tr>
</table><br />

<table width="100%" border="1" style="border-collapse:collapse;">
  <tr bgcolor= "#000000">
		<td width="10%" style="text-align:center; margin:5px; padding:5px; color:#FFFFFF;">Producto</td>
		<td width="50%" style="text-align:left; margin:5px; padding:5px;"></td>
		<td width="10%" style="text-align:right; margin:5px; padding:5px; color:#FFFFFF;">Cantidad</td>
		<td width="16%" style="text-align:left; margin:5px; padding:5px; color:#FFFFFF;">Precio Unitario</td>
		<td width="5%" style="text-align:left; margin:5px; padding:5px; color:#FFFFFF;">Dcto</td>
		<td width="10%" style="text-align:right; margin:5px; padding:5px; color:#FFFFFF;">Total</td>
    </tr>
	
	<?php
	$suma=0;
	for ($i = 0; $i < count($productosIDs); $i++) {
	?>
	<tr>
		<td width="10%" style="text-align:left; margin:5px; padding:5px;"><?php echo($productosIDs[$i]);?></td>
		<td width="50%" style="text-align:left; margin:5px; padding:5px; "><?php echo($productoDescripcion[$i]);?></td>
		<td width="10%" style="text-align:center; margin:5px; padding:5px;">1</td>
		<td width="16%" style="text-align:justify; margin:5px; padding:5px;">$ <?php echo(number_format($productoPrecios[$i], 0, ',', '.'));?></td>
		<td width="5%" style="text-align:left; margin:5px; padding:5px;"></td>
		<td width="10%" style="text-align:right; margin:5px; padding:5px;">$ <?php echo(number_format($productoPrecios[$i], 0, ',', '.'));?></td>
    </tr>
		
	<?php
	$suma=$suma+$productoPrecios[$i];
	}
	?>
	<?php
	for ($i = 0; $i < count($serviciosIDs); $i++) {
	?>
	<tr>
		<td width="10%" style="text-align:left; margin:5px; padding:5px;"><?php echo($serviciosIDs[$i]);?></td>
		<td width="50%" style="text-align:left; margin:5px; padding:5px; "><?php echo($servicioDescripcion[$i]);?></td>
		<td width="10%" style="text-align:center; margin:5px; padding:5px;">1</td>
		<td width="16%" style="text-align:justify; margin:5px; padding:5px;">$ <?php echo(number_format($productoPrecios[$i], 0, ',', '.'));?></td>
		<td width="5%" style="text-align:left; margin:5px; padding:5px;"></td>
		<td width="10%" style="text-align:right; margin:5px; padding:5px;">$ <?php echo(number_format($servicioPrecios[$i], 0, ',', '.'));?></td>
    </tr>
		
	<?php
	$suma=$suma+$servicioPrecios[$i];
	}
	?>
	<tr>
		<td width="10%" style="text-align:center; margin:5px; padding:5px; border:none;"></td>
		<td width="50%" style="text-align:left; margin:5px; padding:5px; border:none;"></td>
		<td width="10%" style="text-align:right; margin:5px; padding:5px; border:none"></td>
		<td width="16%" style="text-align:left; margin:5px; padding:5px; border:none"></td>
		<td width="5%" style="text-align:left; margin:5px; padding:5px;">Neto</td>
		<td width="10%" style="text-align:right; margin:5px; padding:5px;">$ <?php echo(number_format($suma, 0, ',','.') ); ?></td>
    </tr>
	<tr>
		<td width="10%" style="text-align:center; margin:5px; padding:5px; border:none;"></td>
		<td width="50%" style="text-align:left; margin:5px; padding:5px; border:none;"></td>
		<td width="10%" style="text-align:right; margin:5px; padding:5px; border:none"></td>
		<td width="16%" style="text-align:left; margin:5px; padding:5px; border:none"></td>
		<td width="5%" style="text-align:left; margin:5px; padding:5px;">IVA</td>
		<td width="10%" style="text-align:right; margin:5px; padding:5px;">$ <?php echo(number_format(($suma*19/100), 0, ',','.') ); ?></td>
    </tr>
	<tr>
		<td width="10%" style="text-align:center; margin:5px; padding:5px; border:none;"></td>
		<td width="50%" style="text-align:left; margin:5px; padding:5px; border:none;"></td>
		<td width="10%" style="text-align:right; margin:5px; padding:5px; border:none"></td>
		<td width="16%" style="text-align:left; margin:5px; padding:5px; border:none"></td>
		<td width="5%" style="text-align:left; margin:5px; padding:5px;">Total</td>
		<td width="10%" style="text-align:right; margin:5px; padding:5px;">$ <?php echo(number_format(($suma*19/100)+$suma, 0, ',','.') ); ?></td>
    </tr>
	
</table><br />



</body>
</html>

