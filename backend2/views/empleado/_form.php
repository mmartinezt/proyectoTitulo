<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\TipoEmpleado;
use yii\Helpers\ArrayHelper;
use yii\helpers\Url;
use himiklab\colorbox\Colorbox;

$tiposEmpleados=ArrayHelper::map(TipoEmpleado::find()->all(),'id_tipo_empleado', 'descripcion', 'nombre_tipo_empleado');

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

<div class="empleado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rut_empleado')->textInput(['maxlength' => true]) ?>
	
	<i class="fa">
		   <?= $form->field($model, 'id_tipo_empleado')->dropDownList($tiposEmpleados, ['prompt'=>'Seleccione Tipo de Empleado...']) ?>
	</i>
	<a class="colorbox" href="<?php echo(Url::toRoute('tipo-empleado/create2')); ?>"> <input class="btn btn-warning" type="button" value="Agregar nuevo tipo de empleado"></input></a>	
	
	<br>



    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido_paterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido_materno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo_electronico')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
