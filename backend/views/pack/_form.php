<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Pack */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pack-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'path_imagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'precio')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
