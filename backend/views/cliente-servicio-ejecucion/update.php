<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ClienteServicioEjecucion */

$this->title = 'Update Cliente Servicio Ejecucion: ' . $model->id_cliente_ejecucion;
$this->params['breadcrumbs'][] = ['label' => 'Cliente Servicio Ejecucions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cliente_ejecucion, 'url' => ['view', 'id' => $model->id_cliente_ejecucion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cliente-servicio-ejecucion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
