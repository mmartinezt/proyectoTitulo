<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Producto;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OfertaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administrar Ofertas';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="oferta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Oferta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
               
			[
			 'attribute'=>'id_oferta',
			 'options'=>['width'=>'3%'],
			],
			[
				'attribute' => 'nombreproducto',
				'label' => 'Nombre Producto',
				'value' => 'nombreproducto.nombre_producto',
			],
			[
				'attribute' => 'valor_oferta',
				'label' => 'Valor Oferta',
				'format' => 'html',
				'value' => function($data){
								  return '$ '.Html::decode(Html::encode(number_format($data->valor_oferta, 0, ',','.')));
									},	
			],
            'descripcion',

            ['class' => 'yii\grid\ActionColumn',
			'contentOptions' => ['style' => 'width:50px; font-size:23px;'],],
        ],
    ]); ?>
</div>
