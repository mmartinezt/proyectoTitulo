<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CotizacionProducto */

$this->title = $model->id_cotizacion_producto;
$this->params['breadcrumbs'][] = ['label' => 'Cotizacion Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cotizacion-producto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_cotizacion_producto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_cotizacion_producto], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_cotizacion_producto',
            'id_cotizacion',
            'id_producto',
        ],
    ]) ?>

</div>
