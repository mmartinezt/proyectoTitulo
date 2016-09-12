<?php

use yii\helpers\Html;
use yii\grid\GridView;
use himiklab\colorbox\Colorbox;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administrar Clientes';
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
<div class="cliente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Cliente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            
			[
			 'attribute'=>'id_cliente',
			 'options'=>['width'=>'3%'],
			],
            
//            'id_usuario',
			[
				'attribute' => 'rut_empresa',
				'format' => 'html',
				'value' => function($data){
								  return Html::a(Html::encode($data->rut_empresa), ['empresa/updatemodal', 'id' => $data->rut_empresa],
										 ['class'=>'colorbox']);
									},			
			],
            'nombres',
            'apellidos',
            'rut_cliente',
            // 'comuna',
            // 'ciudad',
            // 'calle',
            // 'numero',
            // 'codigo_postal',
            'telefono',
            // 'celular',
            'descripcion',

            ['class' => 'yii\grid\ActionColumn',
			'contentOptions' => ['style' => 'width:50px; font-size:23px;'],],
        ],
    ]); ?>
</div>
