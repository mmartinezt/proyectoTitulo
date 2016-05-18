<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ClienteServicioPeticionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cliente Servicio Peticions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-servicio-peticion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cliente Servicio Peticion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_cliente_servicio_peticion',
            'id_cliente',
            'id_cotizacion',
            'fecha',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
