<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\Helpers\ArrayHelper;
use backend\models\CategoriaProducto;
use backend\models\SubCategoriaProducto;

$categorias=ArrayHelper::map(CategoriaProducto::find()->all(),'id_categoria_producto','nombre');

?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'nombre_producto')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'marca_producto')->textInput(['maxlength' => true]) ?>
	
    <i class="fa">
		<?= $form->field($model, 'id_categoria_producto')->dropDownList($categorias,
		[
			'prompt'=>'Seleccione una Categoría...',
			'onchange'=>'
						$.post( "index.php?r=subcategoria-producto/lists&id='.'"+$(this).val(), function( data ) {
							$( "select#producto-id_subcategoria_producto" ).html( data );
						});'
		]
		) ?>
	</i>
	<?= Html::a('Crear Categoría', ['create'], ['class' => 'btn btn-warning']) ?>
	
	<br>
    
	<i class="fa">
		<?= $form->field($model, 'id_subcategoria_producto')->dropDownList([],['prompt'=>'Seleccione una Sub-categoría...']) ?>
	</i>
	<?= Html::a('Crear Sub-categoría', ['create'], ['class' => 'btn btn-success']) ?>

    <?= $form->field($model, 'path_imagen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?= $form->field($model, 'precio_compra')->textInput() ?>

    <?= $form->field($model, 'precio_venta')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
