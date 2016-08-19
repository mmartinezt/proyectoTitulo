<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\Helpers\ArrayHelper;
use backend\models\Producto;
use kartik\select2\Select2;

$productos=ArrayHelper::map(Producto::find()->all(),'id_prodcto','nombre_producto');
/* @var $this yii\web\View */
/* @var $model backend\models\Oferta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="oferta-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?php
		echo $form->field($model, 'id_producto')->widget(Select2::classname(), [
			'data' => $productos,
			'language' => 'es',
			'hideSearch' => true,
			'options' => ['placeholder' => 'Seleccione Producto...'],
			'pluginOptions' => [
				'allowClear' => true
			],
		]);

	?>

    <?= $form->field($model, 'valor_oferta')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
