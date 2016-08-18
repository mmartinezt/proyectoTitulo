<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TipoEmpleado */

$this->title = 'Update Tipo Empleado: ' . $model->id_tipo_empleado;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo_empleado, 'url' => ['view', 'id' => $model->id_tipo_empleado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-empleado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
