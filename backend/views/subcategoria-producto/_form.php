<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\CategoriaProducto;

/* @var $this yii\web\View */
/* @var $model backend\models\SubcategoriaProducto */
/* @var $form yii\widgets\ActiveForm */

$categorias=ArrayHelper::map(CategoriaProducto::find()->all(),'id_categoria_producto','nombre');

?>

<div class="subcategoria-producto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_categoria_producto')->dropDownList($categorias, ['prompt'=>'Seleccione una Categoría...']) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
