<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Cotizacion */

$this->title = 'Uctualizar Cotización: ' . $model->id_cotizacion;
$this->params['breadcrumbs'][] = ['label' => 'Cotizaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cotizacion, 'url' => ['view', 'id' => $model->id_cotizacion]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cotizacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
