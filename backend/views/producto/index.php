<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="producto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Producto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_prodcto',
			[
				 'attribute' => 'categoria',
				 'label'=>'Categoría',
				 'value' => 'categoria.nombre'
			],
			
            [
				 'attribute' => 'subcategoria',
				 'label'=>'Sub-categoría',
				 'value' => 'subcategoria.nombre'
			 ],
            'nombre_producto',
            [
				 'attribute' => 'marca',
				 'label'=>'Marca',
				 'value' => 'marca.nombre'
			 ],
			 
			 
			//'stock',
			// 'descripcion',
            // 'path_imagen',
            // 'precio_compra',
            // 'precio_venta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
