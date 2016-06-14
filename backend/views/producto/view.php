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
			[
				 'attribute' => 'categoria.nombre',
				 'label'=>'Categoría',
			],
			[
				 'attribute' => 'subcategoria.nombre',
				 'label'=>'Sub-categoría',
			],
            
            'nombre_producto',
			[
				 'attribute' => 'marca.nombre',
				 'label'=>'Marca',
			],
            
			'descripcion',
            'stock',
            'path_imagen',
            'precio_compra',
            'precio_venta',
        ],
    ]) ?>

</div>
