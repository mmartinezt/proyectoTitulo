<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Packs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pack-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Pack', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pack',
            'nombre',
            'descripcion',
            //'path_imagen',
			[
				'attribute' => 'precio',
				'format' => 'html',
				'value' => function($data){
								  return '$ '.Html::decode(Html::encode(number_format($data->precio, 0, ',','.')));
									},			
			],
			
            [    
				'attribute' => 'estado',
                'label' => 'Estado',
				'format' => 'raw',
                'value' => function($data){
								  return Html::a(Html::encode(($data->estado === 1)? 'Activo':'Inactivo'),
										 ['pack/cambiarestado', 'id' => $data->id_pack, 'estado'=>$data->estado],
										 ['class'=>($data->estado === 1)? 'btn btn-success':'btn btn-danger', 'text-align:center;']);
									},
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
