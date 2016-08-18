<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\Helpers\ArrayHelper;
use backend\models\Producto;

$productos=ArrayHelper::map(Producto::find()->all(),'id_prodcto','nombre_producto');
/* @var $this yii\web\View */
/* @var $model backend\models\Oferta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="oferta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_producto')->dropDownList($productos, ['prompt'=>'Seleccione Producto...']) ?>

    <?= $form->field($model, 'valor_oferta')->textInput() ?>

    <?= $form->field($model, 'descuento_porcentaje')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
