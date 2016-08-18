<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Producto;
use backend\models\Servicio;

/* @var $this yii\web\View */
/* @var $model backend\models\Cotizacion */

$this->title = $model->id_cotizacion;
$this->params['breadcrumbs'][] = ['label' => 'Cotizaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cotizacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_cotizacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_cotizacion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro que deseas eliminar este registro?',
                'method' => 'post',
            ],
        ]) ?>
		
		<div align = "right">
			<?php
				echo Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> Generar documento PDF', ['/cotizacion/pdf', 'id_cotizacion'=> $model->id_cotizacion], [
					'class'=>'btn btn-danger', 
					'target'=>'_blank', 
					'data-toggle'=>'tooltip', 
					'title'=>'Cotización formal exportada a PDF'
				]);
			?>
		</div>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_cotizacion',
            'fecha',
            'id_cliente',
            'comentario',
        ],
    ]) ?>

		    <div class="box">
				<div class="box-header">
				  <h3 class="box-title">Productos en cotización</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body no-padding">
				  <table class="table table-striped">
					<tr>
					  <th style="width: 15px">Código</th>
					  <th>Descripción</th>
					  <th>Imagen</th>
					</tr>
					
					<?php
					foreach($pros as $producto){		
					$prod = Producto::find()->where(['id_prodcto' => $producto->id_producto])->one();
					?>
						<tr>
						  <td><?php echo($producto->id_producto); ?></td>
						  <td><?php echo($prod->nombre_producto); ?></td>
						  <td><?php echo('<img src='.Yii::$app->request->baseUrl.'/upload/productos/'.$prod->path_imagen.' width=60></img>'); ?></td>		  
						</tr>
					<?php
					}	
					?>
				  </table>
				</div>
			</div>
			
			<div class="box">
				<div class="box-header">
				  <h3 class="box-title">Servicios en cotización</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body no-padding">
				  <table class="table table-striped">
					<tr>
					  <th style="width: 15px">Código</th>
					  <th>Nombre</th>
					  <th>Descripción</th>
					</tr>
					
					<?php
					foreach($servi as $servicio){		
					$servic = Servicio::find()->where(['id_servicio' => $servicio->id_servicio])->one();
					?>
						<tr>
						  <td><?php echo($servic->id_servicio); ?></td>
						  <td><?php echo($servic->nombre); ?></td>
						  <td><?php echo($servic->descripcion); ?></td>		  
						</tr>
					<?php
					}	
					?>
				  </table>
				</div>
			</div>
	
	

</div>
