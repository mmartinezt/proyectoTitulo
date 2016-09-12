<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TipoEmpleadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administrar Tipos de Empleados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-empleado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tipo Empleado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
			 'attribute'=>'id_tipo_empleado',
			 'options'=>['width'=>'10%'],
			],
			[
			 'attribute'=>'nombre_tipo_empleado',
			 'options'=>['width'=>'30%'],
			],
            
            'descripcion',

            ['class' => 'yii\grid\ActionColumn',
			'contentOptions' => ['style' => 'width:50px; font-size:23px;'],],
        ],
    ]); ?>
</div>
