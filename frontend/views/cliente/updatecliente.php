<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\Cliente */

$this->title = 'Actualizar Cliente: ' . $model->rut_cliente;

?>
<div class="cliente-update">

	<h1>Actualizar datos</h1>

   <div class="cliente-form">

		<?php $form = ActiveForm::begin(); ?>

			<?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'rut_cliente')->textInput(['maxlength' => true,'placeholder'=>'Ingrese Rut... ejemplo: 11.111.111-1', 'onblur' => 'val()']) ?>

			<?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>

			<div class="form-group">
				<?= Html::submitButton('Actualiza', ['btn btn-primary']) ?>
			</div>

		<?php ActiveForm::end(); ?>

	</div>
   
</div>
