<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'nombre_producto')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'marca_producto')->textInput(['maxlength' => true]) ?>
	
    <?= $form->field($model, 'id_categoria_producto')->textInput() ?>

    <?= $form->field($model, 'id_subcategoria_producto')->textInput() ?>

    <?= $form->field($model, 'path_imagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?= $form->field($model, 'precio_compra')->textInput() ?>

    <?= $form->field($model, 'precio_venta')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
