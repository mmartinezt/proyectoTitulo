<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ServicioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administrar Servicios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Servicio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           
			[
			 'attribute'=>'id_servicio',
			 'options'=>['width'=>'10%'],
			],
            'nombre',
            //'descripcion',
            
			[
				'attribute' => 'valor',
				'label' => 'Valor Servicio ($)',
				'format' => 'html',
				'value' => function($data){
								  return '$ '.Html::decode(Html::encode(number_format($data->valor, 0, ',','.')));
									},	
			],

            ['class' => 'yii\grid\ActionColumn',
			'contentOptions' => ['style' => 'width:50px; font-size:23px;'],],
        ],
    ]); ?>
</div>
