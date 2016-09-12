<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MarcaProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administrar Marcas de Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marca-producto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Marca de Producto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            
            [
			 'attribute'=>'id_marca_producto',
			 'options'=>['width'=>'3%'],
            ],
			
			[
			 'attribute'=>'nombre',
			 'options'=>['width'=>'20%'],
            ],
            'descripcion',
			[
			 'attribute'=>'procedencia',
			 'options'=>['width'=>'20%'],
            ],
            

            [
			 'class' => 'yii\grid\ActionColumn',
			 'contentOptions' => ['style' => 'width:50px; font-size:23px;'],],
			],
		
    ]); ?>
</div>
