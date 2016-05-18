<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Empleado */

$this->title = 'Update Empleado: ' . $model->rut_empleado;
$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rut_empleado, 'url' => ['view', 'id' => $model->rut_empleado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="empleado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
