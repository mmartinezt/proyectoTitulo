<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CotizacionServicio */

$this->title = 'Update Cotizacion Servicio: ' . $model->id_cotizacion_servicio;
$this->params['breadcrumbs'][] = ['label' => 'Cotizacion Servicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cotizacion_servicio, 'url' => ['view', 'id' => $model->id_cotizacion_servicio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cotizacion-servicio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
