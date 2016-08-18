<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use backend\models\Cliente;
use yii\Helpers\ArrayHelper;
use yii\helpers\Url;
use himiklab\colorbox\Colorbox;
use backend\models\Producto;
use backend\models\Servicio;
use kartik\select2\Select2;


$prds=ArrayHelper::map(Producto::find()->all(),'id_prodcto','nombre_producto');

$srvcs=ArrayHelper::map(Servicio::find()->all(),'id_servicio','nombre');

$clientes=ArrayHelper::map(Cliente::find()->all(),'id_cliente','nombres');



?>
<?= Colorbox::widget([
    'targets' => [
        '.colorbox' => [
            'maxWidth' => '90%',
            'maxHeight' => '100%',
        ],
    ],
    'coreStyle' => 1
]) ?>


<div class="cotizacion-form">

    <?php $form = ActiveForm::begin(); ?>


	<?= $form->field($model, 'fecha')->widget(DateTimePicker::classname(), [
    
		'name' => 'fecha',

		'readonly' => true,
		'pluginOptions' => [
        'format' => 'yyyy/mm/dd hh:ii:ss',
        'startDate' => '01-Mar-2014 12:00 AM',
        'todayHighlight' => true
    ]
	
	]);
	?>
	
	<i class="fa">
		<?= $form->field($model, 'id_cliente')->dropDownList($clientes, ['prompt'=>'Seleccione Cliente...']) ?>
	</i>
	<a class="colorbox" href="<?php echo(Url::toRoute('cliente/create2')); ?>"> <input class="btn btn-warning" type="button" value="Agregar nuevo Cliente"></input></a>	
	
	<br>

	
	<?php
		echo $form->field($model, 'productos')->widget(Select2::classname(), [
			'data' => $prds,
			'language' => 'es',
			'hideSearch' => true,
			'options' => ['placeholder' => 'Seleccione productos...', 'multiple' => true],
			'pluginOptions' => [
				'tags' => true,
				'allowClear' => true
			],
		]);

	?>
	<a class="colorbox" href="<?php echo(Url::toRoute('producto/create2')); ?>">Agregar Nuevo Producto </a>
	<br>
	<br>
	<br>
	<?php
		echo $form->field($model, 'servicios')->widget(Select2::classname(), [
			'data' => $srvcs,
			'language' => 'es',
			'hideSearch' => true,
			'options' => ['placeholder' => 'Seleccione servicios...', 'multiple' => true],
			'pluginOptions' => [
				'tags' => true,
				'allowClear' => true
			],
		]);

	?>
	<a class="colorbox" href="<?php echo(Url::toRoute('servicio/create2')); ?>">Agregar Nuevo Servicio </a>
	<br>
	<br>
	<br>
	    
		
		<?= $form->field($model, 'comentario')->textInput(['maxlength' => true]) ?>
		
		
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
