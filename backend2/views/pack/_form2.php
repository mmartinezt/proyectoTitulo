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
	
	<?=
		 $form->field($model, 'estado')->widget(Select2::classname(), [
			'data' => [ '1' => 'Activo', '0' => 'Inactivo'],
		]);
	?>
<br>
	

<br>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
