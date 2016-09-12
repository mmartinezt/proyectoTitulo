<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Empresa */

$this->title = 'Actualizar Empresa: ' . $model->rut_empresa;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rut_empresa, 'url' => ['view', 'id' => $model->rut_empresa]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="empresa-update">

    <h1><?= Html::encode($this->title) ?></h1>

   <div class="empresa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_empresa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_fantasia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'giro_empresa')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Actulizar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
