<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\Helpers\ArrayHelper;
use backend\models\Producto;
use kartik\select2\Select2;
use kartik\file\FileInput;

$productos=ArrayHelper::map(Producto::find()->all(),'id_prodcto','nombre_producto');

/* @var $this yii\web\View */
/* @var $model backend\models\Pack */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pack-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'path_imagen')->widget(FileInput::classname(), [
    'options' => ['type'=>'file' ,'accept' => 'image/*'],
	]);
	?>

    <?= $form->field($model, 'precio')->textInput() ?>
<?php
	echo '<label class="control-label">Estado</label>';
	echo Select2::widget([
		'name' => 'estado',
		'hideSearch' => true,
		'data' => [1 => 'Activo', 0 => 'Inactivo'],
		'options' => ['placeholder' => 'Seleccione Estado...'],
		'pluginOptions' => [
			'allowClear' => true
		],
	]);
	?>
<br>
	
<label>Productos</label>	
	<?php 	
		echo Select2::widget([
			'name' => 'estado',
			'value' => '',
			'data' => $productos,
			'options' => ['multiple' => true, 'placeholder' => 'Selecciona Productos ...']
		]);
	?>
<br>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
