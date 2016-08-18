<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\Helpers\ArrayHelper;
use backend\models\CategoriaProducto;
use backend\models\SubCategoriaProducto;
use backend\models\MarcaProducto;
use himiklab\colorbox\Colorbox;
use yii\helpers\Url;
use kartik\file\FileInput;

$categorias=ArrayHelper::map(CategoriaProducto::find()->all(),'id_categoria_producto','nombre');
$marcas=ArrayHelper::map(MarcaProducto::find()->all(),'id_marca_producto','nombre');
?>

<?= Colorbox::widget([
    'targets' => [
        '.colorbox' => [
            'maxWidth' => '90%',
            'maxHeight' => '90%',
        ],
    ],
    'coreStyle' => 1
]) ?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data'],]); ?>

	<?= $form->field($model, 'nombre_producto')->textInput(['maxlength' => true]) ?>
	<i class="fa">
		<?= $form->field($model, 'id_marca_producto')->dropDownList($marcas, ['prompt'=>'Seleccione Marca...']) ?>
	</i>
	<a class="colorbox" href="<?php echo(Url::toRoute('marca-producto/create2')); ?>"> <input class="btn btn-info" type="button" value="Agregar nueva Marca"></input></a>	
	
	<br>
	
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
	
	<a class="colorbox" href="<?php echo(Url::toRoute('categoria-producto/create2')); ?>"> <input class="btn btn-warning" type="button" value="Agregar nueva Categoría"></input></a>
	
	<br>
    
	<i class="fa">
		<?= $form->field($model, 'id_subcategoria_producto')->dropDownList([],['prompt'=>'Seleccione una Sub-categoría...']) ?>
	</i>
	<a class="colorbox" href="<?php echo(Url::toRoute('subcategoria-producto/create2')); ?>"> <input class="btn btn-success" type="button" value="Agregar nueva sub-Categoría"></input></a>


	<?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'image')->widget(FileInput::classname(), [
    'options' => ['type'=>'file' ,'accept' => 'image/*'],
	]);
	?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?= $form->field($model, 'precio_compra')->textInput() ?>

    <?= $form->field($model, 'precio_venta')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
