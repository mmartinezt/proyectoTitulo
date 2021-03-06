<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cotizacion */

$this->title = 'Update Cotizacion: ' . $model->id_cotizacion;
$this->params['breadcrumbs'][] = ['label' => 'Cotizacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cotizacion, 'url' => ['view', 'id' => $model->id_cotizacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cotizacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
