<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmpleadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empleados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Empleado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

			'numero_empleado',
            'rut_empleado',
            
			[
				 'attribute' => 'tipoempleado',
				 'label'=>'Tipo Empleado',
				 'value' => 'tipoempleado.descripcion'
			],

            'nombres',
            'apellido_paterno',
            'apellido_materno',
            // 'direccion',
            // 'correo_electronico',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
