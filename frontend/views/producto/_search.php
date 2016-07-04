<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProductoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_prodcto') ?>

    <?= $form->field($model, 'id_categoria_producto') ?>

    <?= $form->field($model, 'id_subcategoria_producto') ?>

    <?= $form->field($model, 'nombre_producto') ?>

    <?= $form->field($model, 'id_marca_producto') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'stock') ?>

    <?php // echo $form->field($model, 'path_imagen') ?>

    <?php // echo $form->field($model, 'precio_compra') ?>

    <?php // echo $form->field($model, 'precio_venta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
