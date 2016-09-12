<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CotizacionProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administrar Cotizacion Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cotizacion-producto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cotizacion Producto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            
            'id_cotizacion_producto',
            'id_cotizacion',
            'id_producto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
