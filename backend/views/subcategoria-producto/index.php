<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\CategoriaProducto;
use yii\Helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SubcategoriaProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administrar Sub-categorías de Productos';
$this->params['breadcrumbs'][] = $this->title;

$categorias=ArrayHelper::map(CategoriaProducto::find(array('order'=>'nombre'))->all(),'nombre','nombre');

?>
<div class="subcategoria-producto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Sub-categoría de Productos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
			[
			 'attribute'=>'id_subcategoria_producto',
			 'options'=>['width'=>'3%'],
            ],
			[
				 'attribute' => 'categoria',
				 'label'=>'Categoría',
				 'value' => 'categoria.nombre',
				 'filter'=> $categorias,
				 'options'=>['width'=>'20%'],
			],
            [
			 'attribute'=>'nombre',
			 'options'=>['width'=>'25%'],
            ],
			[
			 'attribute'=>'descripcion',
			 'options'=>['width'=>'40%'],
            ],
            

            ['class' => 'yii\grid\ActionColumn',
			 'contentOptions' => ['style' => 'width:50px; font-size:23px;'],
			],
        ],
    ]); ?>
</div>
