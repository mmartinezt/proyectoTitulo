<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\Helpers\ArrayHelper;
use backend\models\Empleado;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\ClienteServicioEjecucion */
/* @var $form yii\widgets\ActiveForm */
$empleados=ArrayHelper::map(Empleado::find()->all(),'numero_empleado','rut_empleado');
?>

<div class="cliente-servicio-ejecucion-form">

    <?php $form = ActiveForm::begin(); ?>

   

    <?= $form->field($model, 'id_empleado')->dropDownList($empleados) ?>

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
	
	<?= $form->field($model, 'estado')->dropDownList(['1'=>'Pendiente', '0'=>'Activo']) ?>
	
    <?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Aceptar Cambios', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
