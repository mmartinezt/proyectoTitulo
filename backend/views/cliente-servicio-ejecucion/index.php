<?php

use yii\helpers\Html;
use yii\grid\GridView;
use himiklab\colorbox\Colorbox;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ClienteServicioEjecucionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administrar Solicitudes de Servicio';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Colorbox::widget([
    'targets' => [
        '.colorbox' => [
            'maxWidth' => '90%',
            'maxHeight' => '90%',
        ],
    ],
    'coreStyle' => 1
]) ?>

<div class="cliente-servicio-ejecucion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            
			[
			 'attribute'=>'id_cliente_ejecucion',
			 'options'=>['width'=>'3%'],
            ],
			
			[    
				'attribute' => 'peticion',
				'label' => 'Id Cotización',
				'options'=>['width'=>'11%'],
				'format' => 'raw',
                'value' => function($data){
								  return Html::a(Html::encode($data->peticion->id_cotizacion),
										 ['cotizacion/viewmodal', 'id' => $data->peticion->id_cotizacion],
										 ['class'=>'label btn-success colorbox']);
									},
            ],

			
			//'id_cliente_peticion',
           
			[    
				'attribute' => 'id_empleado',
				'options'=>['width'=>'15%'],
				'format' => 'raw',
                'value' => function($data){
								  return Html::a(Html::encode(($data->id_empleado != 0)? $data->id_empleado: 'no asignado'),
										 ($data->id_empleado!=0)? ['empleado/view', 'id' => $data->id_empleado]: '#');
									},
            ],
			
			[    
				'attribute' =>'fecha',
				'options'=>['width'=>'20%'],
				'format' => 'raw',
                'value' => function($data){
								  return Html::encode(($data->fecha == '0000-00-00 00:00:00')? 'No asignado':$data->fecha);
									},
            ],
            'observacion',
			[    
				'attribute' => 'estado',
				'options'=>['width'=>'11%'],
				'format' => 'raw',
				'filter' => ['0'=>'Activo', '1'=>'Pendiente'],
                'value' => function($data){
								  return Html::a(Html::encode(($data->estado == 0)? 'Activo':'Pendiente'),
										 '#',
										 ['class'=>($data->estado == 1)? 'label btn-warning':'label btn-success', 'text-align:center;']);
									},
            ],

            ['class' => 'yii\grid\ActionColumn',
			 'contentOptions' => ['style' => 'width:50px; font-size:23px;'],
			],
        ],
    ]); ?>
</div>
