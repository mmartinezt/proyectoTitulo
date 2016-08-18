<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ComentarioCotizacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comentario-cotizacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_comentario_cotizacion') ?>

    <?= $form->field($model, 'id_cotizacion') ?>

    <?= $form->field($model, 'id_usuario') ?>

    <?= $form->field($model, 'pregunta') ?>

    <?= $form->field($model, 'respuesta') ?>

    <?php // echo $form->field($model, 'fecha') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
