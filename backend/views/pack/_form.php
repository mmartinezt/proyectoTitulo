<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Producto;
use kartik\select2\Select2;
use kartik\file\FileInput;
use yii\Helpers\ArrayHelper;
use yii\web\JsExpression;
use yii\helpers\Url;

$prds=ArrayHelper::map(Producto::find()->all(),'id_prodcto','nombre_producto');

/* @var $this yii\web\View */
/* @var $model backend\models\Pack */
/* @var $form yii\widgets\ActiveForm */
$url = 'localhost'.\Yii::$app->urlManager->baseUrl . '/upload/productos/';
$url2 = Url::toRoute('pack/imagen');
$temporal="";
$format = <<< SCRIPT
function format(producto) {
	var archivo="producto.jpg";
	$.ajax({
       url: '$url2',
       data: {id: producto.text},
	   async:false,       
		success:function(data) {
			archivo = data;
		},
    });
	return '<img width="35" class="flag" src="upload/productos/' + archivo + '"/>' + producto.text;
	
}
SCRIPT;
$escape = new JsExpression("function(m) { return m; }");
$this->registerJs($format, \yii\web\View::POS_HEAD);
?>

<div class="pack-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'imagee')->fileInput() ?>

    <?= $form->field($model, 'precio')->textInput() ?>

    <?php
		echo $form->field($model, 'estado')->widget(Select2::classname(), [
			'data' => [1=>'Activo', 0=>'Inactivo'],
			'language' => 'es',
			'hideSearch' => true,
			'options' => ['placeholder' => 'Seleccione un estado'],
			'pluginOptions' => [
				'allowClear' => true
			],
		]);
	?>
	<?php
		echo $form->field($model, 'Productos')->widget(Select2::classname(), [
			'data' => $prds,
			'language' => 'es',
			'hideSearch' => true,
			'options' => ['placeholder' => 'Seleccione productos...', 'multiple' => true],
			'pluginOptions' => [
				'tags' => true,
				'allowClear' => true,
				'templateResult' => new JsExpression('format'),
				'templateSelection' => new JsExpression('format'),
				'escapeMarkup' => $escape,
			],
		]);

	?>
	
 <br>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
