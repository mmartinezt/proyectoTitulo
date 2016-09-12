<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

	<?php
		echo $form->field($model, 'status')->widget(Select2::classname(), [
			'data' => [10=>'Activado', 0=>'Desactivado'],
			'language' => 'es',
			'hideSearch' => true,
			'options' => ['placeholder' => 'Seleccione un estado'],
			'pluginOptions' => [
				'allowClear' => true
			],
		]);
	?>
	<?php
		echo $form->field($model, 'role')->widget(Select2::classname(), [
			'data' => [1=>'Cliente', 2=>'Administrador'],
			'language' => 'es',
			'hideSearch' => true,
			'options' => ['placeholder' => 'Seleccione un Rol'],
			'pluginOptions' => [
				'allowClear' => true
			],
		]);
	?>
	<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear nuevo usuario' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
