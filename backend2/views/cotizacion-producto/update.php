<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CotizacionProducto */

$this->title = 'Update Cotizacion Producto: ' . $model->id_cotizacion_producto;
$this->params['breadcrumbs'][] = ['label' => 'Cotizacion Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cotizacion_producto, 'url' => ['view', 'id' => $model->id_cotizacion_producto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cotizacion-producto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
