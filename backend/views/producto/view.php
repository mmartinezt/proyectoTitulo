<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Producto */

$this->title = $model->nombre_producto;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="producto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_prodcto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_prodcto], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro que quieres eliminar este registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_prodcto',
			'nombre_producto',
			[
				 'attribute' => 'categoria.nombre',
				 'label'=>'Categoría',
			],
			[
				 'attribute' => 'subcategoria.nombre',
				 'label'=>'Sub-categoría',
			],            
            
			[
				 'attribute' => 'marca.nombre',
				 'label'=>'Marca',
			],
			'descripcion',
            'stock',
            'precio_compra',
            'precio_venta',
			[
				 'attribute' => 'path_imagen',
				 'format'=>'html',
				 'value' => '<img src='.Yii::$app->request->baseUrl.'/upload/productos/'.$model->path_imagen.' width=120></img>'  
			],
		],
    ]) ?>

</div>
