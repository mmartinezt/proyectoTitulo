<?php

use yii\helpers\Html;
use backend\models\Producto;
use yii\Helpers\ArrayHelper;
use himiklab\colorbox\Colorbox;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Producto */

$this->title = 'Carrito de Compras';
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
echo('<a href='.Yii::$app->request->baseUrl.'/index.php?r=producto%2Fvitrina&id=0><img src='.Yii::$app->request->baseUrl.'/upload/productos/carrito-10.png style="position: fixed; top: 51px; right: 0px;" width=70></img></a>');
?>

<?= Colorbox::widget([
    'targets' => [
        '.colorbox' => [
            'maxWidth' => '100%',
            'maxHeight' => '100%',
        ],
    ],
    'coreStyle' => 1
]) ?>


<div class="producto-create">

    <h1><?= Html::encode($this->title) ?></h1>
	<?php
		$session = Yii::$app->session;	
	?>
	<div align="right">
		<?php
		echo Html::a('<i class="fa glyphicon glyphicon-shopping-cart"></i> Agregar mas Productos', ['/producto/vitrina','id'=>0], [
										'class'=>'btn btn-success',  
										'data-toggle'=>'tooltip', 
										'title'=>'Cotizacion formal exportada a PDF'
									]);
		?>
	</div>					
<table width="100%" border="1">
	<tr>
		<td width="20%"> Producto</td>
		<td width="50%"> Descripción</td>
		<td width="10%"> Código</td>
		<td width="10%"> Precio</td>
		<td width="10%"> Opciones</td>
	</tr>
	
	<?php 
	
		foreach($session['producto'] as $indice => $producto){
			if($producto!=null){
				$pro=Producto::find()->where(['id_prodcto' => $producto])->one();
	?>
			<tr>
				<td width="10%"> <img width="80px" src="<?php echo("upload/productos/".$pro->path_imagen);?>"/></td>
				<td width="60%"> <?php echo($pro->descripcion); ?></td>
				<td width="10%"> <?php echo($producto); ?></td>
				<td width="10%"> <?php echo($pro->precio_venta); ?></td>
				<td width="10%">
						<center>
						<?php
							echo Html::a('<i class="fa glyphicon glyphicon-trash"></i> Eliminar', ['/producto/eliminar', 'id'=> $producto], [
								'class'=>'btn btn-danger',  
								'data-toggle'=>'tooltip', 
								'title'=>'Cotizacion formal exportada a PDF'
							]);
						?>
						</center>
				</td>
			</tr>
	<?php	
			}
		}
	
	?>
	
</table>
<div align="right">
	<span class="fa-file-pdf-o"></span>
			
				
				
			<?php
			$hayProducto=false;
			foreach($session['producto'] as $indice => $producto){
				if($producto != null){
					$hayProducto = true;
				}
			}
			
			echo $hayProducto ? 
			
			Html::a('<i class="fa glyphicon glyphicon-open-file"></i> Exportar a PDF', ['/producto/formulario'], [
											'class'=>'btn btn-warning colorbox',
											'data-toggle'=>'tooltip', 
											'title'=>'Cotizacion formal exportada a PDF'
										]) 
										
			: 
			Html::a('<i class="fa glyphicon glyphicon-open-file"></i> Exportar a PDF', ['/producto/vitrina', 'id'=>'0'], [
											'class'=>'btn btn-warning',
											'data-toggle'=>'tooltip', 
											'title'=>'Cotizacion formal exportada a PDF'
										])
			;
			
			
			?>
</div>	

</div>


<?php 
	if(isset($_GET['mensaje'])){
		echo('
			<div class="col-md-6">
			  <div class="box box-default">
				<div class="box-header with-border">
				  <i class="fa fa-warning"></i>
				  <h3 class="box-title">Mensaje</h3>
				</div>
				<div class="box-body">
				  <div class="alert alert-info alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-info"></i> Alert!</h4>
					Info alert preview. This alert is dismissable.
				  </div>
				</div>
			  </div>
			</div>
        ');
	}
	
?>



