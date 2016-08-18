<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Producto;
use kartik\select2\Select2;
use kartik\file\FileInput;
use yii\Helpers\ArrayHelper;

$prds=ArrayHelper::map(Producto::find()->all(),'id_prodcto','nombre_producto');

/* @var $this yii\web\View */
/* @var $model backend\models\Pack */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pack-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'imagee')->fileInput() ?>

    <?= $form->field($model, 'precio')->textInput() ?>

    <?php
		echo $form->field($model, 'estado')->widget(Select2::classname(), [
			'data' => [1=>'Activo', 0=>'Inactivo'],
			'language' => 'es',
			'hideSearch' => true,
			'options' => ['placeholder' => 'Seleccione un estado'],
			'pluginOptions' => [
				'allowClear' => true
			],
		]);

	?>
	<?php
		echo $form->field($model, 'Productos')->widget(Select2::classname(), [
			'data' => $prds,
			'language' => 'es',
			'hideSearch' => true,
			'options' => ['placeholder' => 'Seleccione productos...', 'multiple' => true],
			'pluginOptions' => [
				'tags' => true,
				'allowClear' => true
			],
		]);

	?>
	
 <br>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
