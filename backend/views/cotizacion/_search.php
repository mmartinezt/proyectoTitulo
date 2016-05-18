<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CotizacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cotizacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cotizacion') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'id_cliente') ?>

    <?= $form->field($model, 'comentario') ?>

    <?= $form->field($model, 'id_servicio') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
