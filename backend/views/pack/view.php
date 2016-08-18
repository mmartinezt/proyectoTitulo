<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Pack */

$this->title = $model->id_pack;
$this->params['breadcrumbs'][] = ['label' => 'Packs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pack-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_pack], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_pack], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro que deseas eliminar este items?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pack',
            'nombre',
            'descripcion',
            'precio',
            'estado',
			[
				 'attribute' => 'path_imagen',
				 'label'=>'Imagen',
				 'format'=>'html',
				 'value' => '<img src='.Yii::$app->request->baseUrl.'/upload/packs/'.$model->path_imagen.' width=120></img>'  
			],
        ],
    ])?>
	
	        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Productos en pack</h3>
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
				foreach($model->productos as $producto){		
				?>
				
					<tr>
					  <td><?php echo($producto->producto->id_prodcto); ?></td>
					  <td><?php echo($producto->producto->nombre_producto); ?></td>
					  <td><?php echo('<img src='.Yii::$app->request->baseUrl.'/upload/productos/'.$producto->producto->path_imagen.' width=80></img>'); ?></td>
					  
					</tr>
				
				<?php
				}	
				?>
				
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

</div>
