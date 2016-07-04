<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use himiklab\colorbox\Colorbox;
use backend\models\Empresa;
use yii\Helpers\ArrayHelper;
use yii\helpers\Url;

	$empresas=ArrayHelper::map(Empresa::find()->all(),'rut_empresa','nombre_empresa');
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

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

	</br>
    <i class="fa">
		<?= $form->field($model, 'rut_empresa')->dropDownList($empresas, ['prompt'=>'Seleccione Empresa...']) ?>
	</i>
	<a class="colorbox" href="<?php echo(Url::toRoute('empresa/create2')); ?>"> <input class="btn btn-primary" type="button" value="Agregar nueva Empresa"></input></a>	
	
	<br>

    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rut_cliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comuna')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ciudad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'calle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero')->textInput() ?>

    <?= $form->field($model, 'codigo_postal')->textInput() ?>
	
	Si no conoce su código postal puede obtenerlo desde <a href="http://www.correos.cl/SitePages/codigo_postal/codigo_postal.aspx" target="_blank">aquí</a>
	</br>
	</br>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualiza', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
