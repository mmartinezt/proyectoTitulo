<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategoriaProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administrar Categoría de Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-producto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Categoría Producto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           
			[
			 'attribute'=>'id_categoria_producto',
			 'options'=>['width'=>'3%'],
            ],
            [
			 'attribute'=>'nombre',
			 'options'=>['width'=>'30%'],
            ],
            [
			 'attribute'=>'descripcion',
			 'options'=>['width'=>'60%'],
            ],
            

            [
			 'class' => 'yii\grid\ActionColumn',
			 'contentOptions' => ['style' => 'width:50px; font-size:23px;'],
			],
        ],
    ]); ?>
</div>
