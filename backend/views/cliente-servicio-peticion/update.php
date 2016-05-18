<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ClienteServicioPeticion */

$this->title = 'Update Cliente Servicio Peticion: ' . $model->id_cliente_servicio_peticion;
$this->params['breadcrumbs'][] = ['label' => 'Cliente Servicio Peticions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cliente_servicio_peticion, 'url' => ['view', 'id' => $model->id_cliente_servicio_peticion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cliente-servicio-peticion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
