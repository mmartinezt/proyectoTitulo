<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CotizacionServicio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cotizacion-servicio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_cotizacion')->textInput() ?>

    <?= $form->field($model, 'id_servicio')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
