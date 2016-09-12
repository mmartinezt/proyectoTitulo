<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CotizacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administrar Cotizaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cotizacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Cotización', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            
			[
			 'attribute'=>'id_cotizacion',
			 'options'=>['width'=>'3%'],
			],
            
            [
			 'attribute' => 'id_cliente',
			 'options'=>['width'=>'15%'],
			],
            
            'comentario',
			[
			 'attribute'=>'fecha',
			 'options'=>['width'=>'15%'],
			],
            ['class' => 'yii\grid\ActionColumn',
			'contentOptions' => ['style' => 'width:50px; font-size:23px;'],],
        ],
    ]); ?>
</div>
