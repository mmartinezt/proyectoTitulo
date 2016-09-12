<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CotizacionServicioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administrar Cotizacion Servicios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cotizacion-servicio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cotizacion Servicio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id_cotizacion_servicio',
            'id_cotizacion',
            'id_servicio',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
