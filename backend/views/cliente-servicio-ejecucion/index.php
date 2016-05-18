<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ClienteServicioEjecucionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cliente Servicio Ejecucions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-servicio-ejecucion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cliente Servicio Ejecucion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_cliente_ejecucion',
            'id_cliente_peticion',
            'id_empleado',
            'fecha',
            'observacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
